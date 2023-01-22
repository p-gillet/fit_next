DROP SCHEMA IF EXISTS fitnext CASCADE;
CREATE SCHEMA fitnext;

SET search_path TO fitnext;

/* Tables */

CREATE TABLE adresse (
    numAdresse SERIAL,
    ville varchar(50),
    codePostale integer,
    rue varchar(150),
    numeroDeRue varchar(10)
);

CREATE TABLE personne (
    numAVS bigint NOT NULL,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    sexe char NOT NULL,
    numTelephone varchar(20) NOT NULL,
    photo varchar(250),
    dateNaissance date NOT NULL,
    numAdresse integer NOT NULL
);

CREATE TABLE employe (
    numAVS bigint NOT NULL,
    salaire integer NOT NULL CHECK (salaire > 0),
    tauxActivite integer NOT NULL CHECK (tauxActivite > 0 AND tauxActivite <= 100)
);

CREATE TABLE coach (
    numAVS bigint NOT NULL,
    certification varchar(150) NOT NULL
);

CREATE TABLE abonne (
    numAVS bigint NOT NULL,
    dateInscription date NOT NULL,
    dateFinContrat date NOT NULL
);

CREATE TABLE materielFitness (
    numMateriel SERIAL,
    dateMiseADispo date NOT NULL,
    numType integer NOT NULL,
    numAbonne bigint,
    numLocal integer NOT NULL
);

CREATE TABLE typeMateriel (
    numType SERIAL,
    nom varchar(150) NOT NULL
);

CREATE TABLE exercice (
    numExercice SERIAL,
    description varchar(150) NOT NULL,
    musclesTravaille varchar(150) NOT NULL
);

CREATE TABLE programmeIndividuel (
    numProgramme SERIAL,
    objectif varchar(150) NOT NULL,
    series integer NOT NULL,
    numCoach bigint NOT NULL,
    numAbonne bigint NOT NULL
);

CREATE TABLE coursCollectif (
    numCours SERIAL,
    typeCours varchar(150) NOT NULL,
    heureCours time NOT NULL,
    dateCours date NOT NULL,
    numLocal integer NOT NULL
);

CREATE TABLE local (
    numLocal SERIAL,
    numAdresse integer NOT NULL
);

/* Tables intermédiaires */

CREATE TABLE typeMateriel_exercice (
    numType integer NOT NULL,
    numExercice integer NOT NULL
);

CREATE TABLE abonne_coursCollectif (
    numAbonne bigint NOT NULL,
    numCours bigint NOT NULL,
    estVenu boolean
);

CREATE TABLE exercice_programmeIndividuel (
    numExercice integer NOT NULL,
    numProgramme integer NOT NULL
);

CREATE TABLE coach_coursCollectif (
    numCoach bigint NOT NULL,
    numCours integer NOT NULL
);

/* Clés primaires */
-- Tables
ALTER TABLE adresse ADD CONSTRAINT adresse_pk PRIMARY KEY (numAdresse);
ALTER TABLE local ADD CONSTRAINT local_pk PRIMARY KEY (numLocal);
ALTER TABLE coach ADD CONSTRAINT coach_pk PRIMARY KEY (numAVS);
ALTER TABLE personne ADD CONSTRAINT personne_pk PRIMARY KEY (numAVS);
ALTER TABLE abonne ADD CONSTRAINT abonne_pk PRIMARY KEY (numAVS);
ALTER TABLE employe ADD CONSTRAINT employe_pk PRIMARY KEY (numAVS);
ALTER TABLE exercice ADD CONSTRAINT exercice_pk PRIMARY KEY (numExercice);
ALTER TABLE programmeIndividuel ADD CONSTRAINT programmeIndividuel_pk PRIMARY KEY (numProgramme);
ALTER TABLE coursCollectif ADD CONSTRAINT coursCollectif_pk PRIMARY KEY (numCours);
ALTER TABLE materielFitness ADD CONSTRAINT materielFitness_pk PRIMARY KEY (numMateriel);
ALTER TABLE typeMateriel ADD CONSTRAINT typeMateriel_pk PRIMARY KEY (numType);

-- Tables intermédiaires
ALTER TABLE typeMateriel_exercice ADD CONSTRAINT typeMateriel_exercice_pk PRIMARY KEY (numType, numExercice);
ALTER TABLE abonne_coursCollectif ADD CONSTRAINT abonne_coursCollectif_pk PRIMARY KEY (numAbonne, numCours);
ALTER TABLE exercice_programmeIndividuel ADD CONSTRAINT exercice_programmeIndividuel_pk PRIMARY KEY (numExercice, numProgramme);
ALTER TABLE coach_coursCollectif ADD CONSTRAINT coach_coursCollectif_pk PRIMARY KEY (numCoach, numCours);

/* Clés étrangères */
-- Contraintes d'héritage 1..1 à 0..*
ALTER TABLE employe ADD CONSTRAINT employe_personne_fk FOREIGN KEY (numAVS) REFERENCES personne(numAVS);
ALTER TABLE coach ADD CONSTRAINT coach_employe_fk FOREIGN KEY (numAVS) REFERENCES employe(numAVS);
ALTER TABLE abonne ADD CONSTRAINT abonne_personne_fk FOREIGN KEY (numAVS) REFERENCES personne(numAVS);

-- Contraintes 1..1 à 0..*
ALTER TABLE materielFitness ADD CONSTRAINT materielFitness_local_fk FOREIGN KEY (numLocal) REFERENCES local(numLocal);
ALTER TABLE materielFitness ADD CONSTRAINT materielFitness_typeMateriel_fk FOREIGN KEY (numType) REFERENCES typeMateriel(numType);
ALTER TABLE coursCollectif ADD CONSTRAINT coursCollectif_local_fk FOREIGN KEY (numLocal) REFERENCES local(numLocal);
ALTER TABLE programmeIndividuel ADD CONSTRAINT programmeIndividuel_coach_fk FOREIGN KEY (numCoach) REFERENCES coach(numAVS);
ALTER TABLE programmeIndividuel ADD CONSTRAINT programmeIndividuel_abonne_fk FOREIGN KEY (numAbonne) REFERENCES abonne(numAVS);
ALTER TABLE personne ADD CONSTRAINT personne_adresse_fk FOREIGN KEY (numAdresse) REFERENCES adresse(numAdresse);
ALTER TABLE local ADD CONSTRAINT local_adresse_fk FOREIGN KEY (numAdresse) REFERENCES adresse(numAdresse);

-- Contraintes 0..1 à 0..*
ALTER TABLE materielFitness ADD CONSTRAINT materielFitness_abonne_fk FOREIGN KEY (numAbonne) REFERENCES abonne(numAVS);

-- Contraintes 0..* à 0..*
ALTER TABLE typeMateriel_exercice ADD CONSTRAINT typeMateriel_exercice_fk_a FOREIGN KEY (numType) REFERENCES typeMateriel(numType);
ALTER TABLE typeMateriel_exercice ADD CONSTRAINT typeMateriel_exercice_fk_b FOREIGN KEY (numExercice) REFERENCES exercice(numExercice);

ALTER TABLE abonne_coursCollectif ADD CONSTRAINT abonne_coursCollectif_fk_a FOREIGN KEY (numAbonne) REFERENCES abonne(numAVS);
ALTER TABLE abonne_coursCollectif ADD CONSTRAINT abonne_coursCollectif_fk_b FOREIGN KEY (numCours) REFERENCES coursCollectif(numCours);

-- Contraintes 1..* à 0..*
ALTER TABLE exercice_programmeIndividuel ADD CONSTRAINT exercice_programmeIndividuel_fk_a FOREIGN KEY (numExercice) REFERENCES exercice(numExercice);
ALTER TABLE exercice_programmeIndividuel ADD CONSTRAINT exercice_programmeIndividuel_fk_b FOREIGN KEY (numProgramme) REFERENCES programmeIndividuel(numProgramme);

ALTER TABLE coach_coursCollectif ADD CONSTRAINT coach_coursCollectif_fk_a FOREIGN KEY (numCoach) REFERENCES coach(numAVS);
ALTER TABLE coach_coursCollectif ADD CONSTRAINT coach_coursCollectif_fk_b FOREIGN KEY (numCours) REFERENCES coursCollectif(numCours);
