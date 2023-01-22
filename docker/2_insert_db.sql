SET search_path TO fitnext;

/* Adresses */
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la calle', '45bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la strass', '78');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '81');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Dubai', 'الشارع', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');
INSERT INTO adresse (codePostale, ville, rue, numeroDeRue) VALUES ( 1000, 'Lausanne', 'Rue de la street', '78bis');


/* type de materiel */
INSERT INTO typeMateriel (nom) VALUES ('Tapis de course');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de sol');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de yoga');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de musculation');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de fitness');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de gymnastique');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de pilates');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de stretching');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de cardio');
INSERT INTO typeMateriel (nom) VALUES ('Tapis de crossfit');$
/* Local */
INSERT INTO local (numAdresse) VALUES (1);
INSERT INTO local (numAdresse) VALUES (2);
INSERT INTO local (numAdresse) VALUES (3);
INSERT INTO local (numAdresse) VALUES (4);
INSERT INTO local (numAdresse) VALUES (5);
INSERT INTO local (numAdresse) VALUES (6);
INSERT INTO local (numAdresse) VALUES (7);
INSERT INTO local (numAdresse) VALUES (8);

/* Muscles */
INSERT INTO exercice (description, musclesTravaille) VALUES ('Abdominaux', 'Abdominaux');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Adducteurs', 'Adducteurs');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Biceps', 'Biceps');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Bras', 'Bras');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Cuisse', 'Cuisse');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Dos', 'Dos');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Epaules', 'Epaules');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Fessiers', 'Fessiers');
INSERT INTO exercice (description, musclesTravaille) VALUES ('Jambes', 'Jambes');
INSERT INTO exercice (description, musclesTravaille) VALUES ( 'Mollets', 'Mollets');
INSERT INTO exercice (description, musclesTravaille) VALUES ( 'Pectoraux', 'Pectoraux');
INSERT INTO exercice (description, musclesTravaille) VALUES ( 'Triceps', 'Triceps');


/* Exercices */
INSERT INTO typeMateriel_exercice VALUES (1, 1);
INSERT INTO typeMateriel_exercice VALUES (1, 2);
INSERT INTO typeMateriel_exercice VALUES (1, 3);
INSERT INTO typeMateriel_exercice VALUES (1, 4);
INSERT INTO typeMateriel_exercice VALUES (1, 5);
INSERT INTO typeMateriel_exercice VALUES (1, 6);
INSERT INTO typeMateriel_exercice VALUES (1, 7);
INSERT INTO typeMateriel_exercice VALUES (1, 8);
INSERT INTO typeMateriel_exercice VALUES (2, 1);
INSERT INTO typeMateriel_exercice VALUES (2, 2);
INSERT INTO typeMateriel_exercice VALUES (2, 3);
INSERT INTO typeMateriel_exercice VALUES (2, 4);
INSERT INTO typeMateriel_exercice VALUES (3, 1);
INSERT INTO typeMateriel_exercice VALUES (3, 2);
INSERT INTO typeMateriel_exercice VALUES (3, 3);


/* Personne */
INSERT INTO personne VALUES (7564152876978, 'Jean', 'Dupont', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 1);
INSERT INTO personne VALUES (7564152876979, 'Jeanne', 'Dupont', 'F', '079 123 45 67', NULL, '2020-02-11 11:18:29', 2);
INSERT INTO personne VALUES (7564152876980, 'Jean', 'Doe', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 3);
INSERT INTO personne VALUES (7564152876981, 'Jeanne', 'Doe', 'F', '079 123 45 67', NULL, '2020-02-11 11:18:29', 4);
INSERT INTO personne VALUES (7564152876982, 'Ellie', 'Faya', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 5);
INSERT INTO personne VALUES (7564152876983, 'Mohamed', 'Ali', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 6);
INSERT INTO personne VALUES (7564152876984, 'Mike', 'Tyson', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 7);
INSERT INTO personne VALUES (7564152876985, 'Anthony', 'Joshua', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 8);
INSERT INTO personne VALUES (7564152876986, 'Conner', 'McGregor', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 9);
INSERT INTO personne VALUES (7564152876987, 'Bruce', 'Lee', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 10);
INSERT INTO personne VALUES (7564152876988, 'Ryan', 'Reynolds', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 11);
INSERT INTO personne VALUES (7564152876989, 'Elon', 'Musk', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 12);
INSERT INTO personne VALUES (7564152876990, 'Bill', 'Gates', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 13);
INSERT INTO personne VALUES (7564152876991, 'Steve', 'Jobs', 'M', '079 123 45 67', NULL, '2020-02-11 11:18:29', 14);
INSERT INTO personne VALUES (7564152876992, 'Mia', 'Khalifa', 'F', '079 123 45 67', NULL, '2020-02-11 11:18:29', 15);
INSERT INTO personne VALUES (7564152876993, 'Lana', 'Rhoades', 'F', '079 123 45 67', NULL, '2020-02-11 11:18:29', 16);
INSERT INTO personne VALUES (7564152876994, 'Janice', 'Griffith', 'F', '079 123 45 67', NULL, '2020-02-11 11:18:29', 17);


/* Abonne */
INSERT INTO abonne VALUES (7564152876989,'2020-02-10 11:18:29', '2023-02-11 11:18:29');
INSERT INTO abonne VALUES (7564152876992,'2020-01-11 11:18:29', '2024-02-11 11:18:29');
INSERT INTO abonne VALUES (7564152876993,'2020-02-02 11:18:29', '2022-02-11 11:18:29');
INSERT INTO abonne VALUES (7564152876986,'2020-02-01 11:18:29', '2024-02-11 11:18:29');
INSERT INTO abonne VALUES (7564152876987,'2020-02-03 11:18:29', '2023-02-11 11:18:29');
INSERT INTO abonne VALUES (7564152876984,'2020-02-04 11:18:29', '2026-02-11 11:18:29');
INSERT INTO abonne VALUES (7564152876983,'2020-02-05 11:18:29', '2028-02-11 11:18:29');

/* Employe */
INSERT INTO employe VALUES (7564152876989, 5000, 60);
INSERT INTO employe VALUES (7564152876992, 5000, 60);
INSERT INTO employe VALUES (7564152876993, 5000, 60);
INSERT INTO employe VALUES (7564152876986, 5000, 60);
INSERT INTO employe VALUES (7564152876987, 5000, 60);
INSERT INTO employe VALUES (7564152876984, 5000, 60);
INSERT INTO employe VALUES (7564152876983, 5000, 60);
INSERT INTO employe VALUES (7564152876978, 3000, 100);
INSERT INTO employe VALUES (7564152876982, 4000, 80);
INSERT INTO employe VALUES (7564152876981, 1000, 40);
INSERT INTO employe VALUES (7564152876994, 2000, 50);
INSERT INTO employe VALUES (7564152876985, 1500, 30);
INSERT INTO employe VALUES (7564152876991, 2500, 70);

/* Coach */
INSERT INTO coach VALUES (7564152876989, 'Certifié Coach gestion du stress');
INSERT INTO coach VALUES (7564152876992, 'Certifié Bon coach');
INSERT INTO coach VALUES (7564152876993, 'Certifié Coach sportif');
INSERT INTO coach VALUES (7564152876986, 'Certifié Coach arts martiaux');
INSERT INTO coach VALUES (7564152876987, 'Certifié Coach de vie');
INSERT INTO coach VALUES (7564152876984, 'Certifié Coach de yoga');
/* Materiel fitness */
INSERT INTO materielFitness (dateMiseADispo, numType, numAbonne, numLocal) VALUES ('2020-02-11 11:18:29', 1, NULL, 1);
INSERT INTO materielFitness (dateMiseADispo, numType, numAbonne, numLocal) VALUES ('2020-02-03 11:18:29', 2, NULL, 2);
INSERT INTO materielFitness (dateMiseADispo, numType, numAbonne, numLocal) VALUES ('2020-04-11 11:18:29', 3, 7564152876989, 3);
INSERT INTO materielFitness (dateMiseADispo, numType, numAbonne, numLocal) VALUES ('2020-02-11 11:18:29', 4, 7564152876992, 4);
INSERT INTO materielFitness (dateMiseADispo, numType, numAbonne, numLocal) VALUES ('2020-02-11 11:18:29', 5, 7564152876993, 5);
INSERT INTO materielFitness (dateMiseADispo, numType, numAbonne, numLocal) VALUES ('2020-02-11 11:18:29', 6, 7564152876986, 6);

/* Programme individuel */
INSERT INTO programmeIndividuel (objectif, series, numCoach, numAbonne) VALUES ('Sèche', 4, 7564152876989, 7564152876989);
INSERT INTO programmeIndividuel (objectif, series, numCoach, numAbonne) VALUES ('Prise de masse', 4, 7564152876992, 7564152876992);
INSERT INTO programmeIndividuel (objectif, series, numCoach, numAbonne) VALUES ('Maintient', 4, 7564152876993, 7564152876993);
INSERT INTO programmeIndividuel (objectif, series, numCoach, numAbonne) VALUES ('Endurance', 4, 7564152876986, 7564152876986);

/* Cours collectif */
INSERT INTO coursCollectif (typeCours, heureCours, dateCours, numLocal) VALUES ('Body pump', '04:05:06', '1999-01-08', 4);
INSERT INTO coursCollectif (typeCours, heureCours, dateCours, numLocal) VALUES ('Cross fit', '06:15:36', '1999-08-08', 4);
INSERT INTO coursCollectif (typeCours, heureCours, dateCours, numLocal) VALUES ('Grid', '16:30:40', '2000-12-09', 5);
INSERT INTO coursCollectif (typeCours, heureCours, dateCours, numLocal) VALUES ('Body pump', '20:15:00', '2022-12-12', 4);
INSERT INTO coursCollectif (typeCours, heureCours, dateCours, numLocal) VALUES ('Body grid', '06:00:00', '2022-12-08', 4);
INSERT INTO coursCollectif (typeCours, heureCours, dateCours, numLocal) VALUES ('Cross pump', '06:15:36', '1999-08-08', 8);

/* Abonne cours collectif */
INSERT INTO abonne_CoursCollectif VALUES (7564152876989, 1, false);
INSERT INTO abonne_CoursCollectif VALUES (7564152876992, 2, true);
INSERT INTO abonne_CoursCollectif VALUES (7564152876993, 3, true);
INSERT INTO abonne_CoursCollectif VALUES (7564152876986, 4, true);
INSERT INTO abonne_CoursCollectif VALUES (7564152876987, 5, false);
INSERT INTO abonne_CoursCollectif VALUES (7564152876984, 6, true);

/* exercice_programmeIndividuel */
INSERT INTO exercice_programmeIndividuel VALUES (1, 1);
INSERT INTO exercice_programmeIndividuel VALUES (2, 1);
INSERT INTO exercice_programmeIndividuel VALUES (3, 3);
INSERT INTO exercice_programmeIndividuel VALUES (4, 4);
INSERT INTO exercice_programmeIndividuel VALUES (5, 2);
INSERT INTO exercice_programmeIndividuel VALUES (6, 2);

/* coach_coursCollectif */
INSERT INTO coach_coursCollectif VALUES (7564152876989, 1);
INSERT INTO coach_coursCollectif VALUES (7564152876992, 2);
INSERT INTO coach_coursCollectif VALUES (7564152876993, 3);
INSERT INTO coach_coursCollectif VALUES (7564152876986, 4);
INSERT INTO coach_coursCollectif VALUES (7564152876987, 5);