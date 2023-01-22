SET search_path TO fitnext;

/* Vue qui liste tous les abonnés qui ne viennent pas aux cours auquel ils sont inscrits,
   compte pour chaque type de cours le nombre d'absence */

DROP VIEW IF EXISTS abonnes_absents;

CREATE VIEW abonnes_absents
AS
SELECT a.numavs,
       nom,
       prenom,
       c.typecours,
       COUNT(*) AS NbreAbsences
FROM abonne a
    JOIN personne p
        ON a.numavs = p.numavs
    JOIN abonne_courscollectif ac
        ON a.numavs = ac.numabonne
    JOIN courscollectif c
        ON c.numcours = ac.numcours
WHERE ac.estvenu = FALSE
GROUP BY a.numavs,
         nom,
         prenom,
         c.typecours;

/* Vue qui permet de voir les cours collectifs, ou ils ont lieu, et le nombre d'abonnés qui y sont inscrits, le coach */

DROP VIEW IF EXISTS courscollectif_coach;

CREATE VIEW courscollectif_coach
AS
SELECT c.typecours,
       p.nom AS nomcoach,
       p.prenom AS prenomcoach ,
       COUNT(*) AS nbreParticipants,
       a.ville,
       a.rue,
       a.codepostale
FROM courscollectif c
    JOIN coach_courscollectif cc
        ON c.numcours = cc.numcours
    JOIN personne p
        ON cc.numcoach = p.numavs
    JOIN local l
        ON c.numlocal = l.numlocal
    JOIN adresse a
        ON a.numadresse = l.numadresse
GROUP BY c.typecours,
         p.nom,
         p.prenom,
         a.ville,
         a.rue,
         a.codepostale;

/* vue qui permet d'afficher les 3 matériels les plus utilisés par les abonnés */

DROP VIEW IF EXISTS materiel_plus_utilise;

CREATE VIEW materiel_plus_utilise
AS
SELECT tm.nom,
       COUNT(*) AS nbreUtilisation
FROM materielfitness m
    JOIN typemateriel tm
        ON m.numtype = tm.numtype
GROUP BY tm.nom
ORDER BY nbreUtilisation DESC
LIMIT 3;

/* trigger qui a chaque prolongement d'un abonnement rajoute 1 mois à son abonnement */

CREATE OR REPLACE FUNCTION cadeau_abonnement()
    RETURNS TRIGGER
LANGUAGE plpgsql
AS $$
BEGIN
    IF DATE_PART('day', NEW.datefincontrat::TIMESTAMP - OLD.datefincontrat::TIMESTAMP) >= 365
    THEN
        NEW.datefincontrat = NEW.datefincontrat + INTERVAL '1 month';
    END IF;
    RETURN NEW;
END $$;

CREATE OR REPLACE TRIGGER after_new_subscription
    BEFORE UPDATE
    ON abonne
    FOR EACH ROW
    EXECUTE FUNCTION cadeau_abonnement();

/* Trigger qui permet de voir si un abonné à encore un abonnement avant qu'il puisse s'inscrire à un cous */

CREATE OR REPLACE FUNCTION checkInscriptionPossible()
RETURNS TRIGGER AS $checkInscriptionPossible$
    BEGIN
        IF (SELECT dateFinContrat FROM abonne a WHERE a.numavs = NEW.numabonne) <= (SELECT datecours FROM courscollectif c WHERE c.numcours = NEW.numcours) THEN
            BEGIN
                RAISE EXCEPTION 'Cette personne ne peut pas participer à ce cours car il n est pas abonné';
            END;
        END IF;
        RETURN NEW;
    END;
$checkInscriptionPossible$
LANGUAGE plpgsql;

CREATE OR REPLACE TRIGGER checkInscriptionPossibleAbo
BEFORE INSERT
ON abonne_courscollectif
FOR EACH ROW
EXECUTE FUNCTION checkInscriptionPossible();