
-- Créaction de la table des citations

CREATE TABLE IF NOT EXISTS citations (
    id SMALLINT UNSIGNED AUTO_INCREMENT ,
    texte VARCHAR (255) NOT NULL,
    auteur VARCHAR (50) NOT NULL,
    PRIMARY KEY (id) 

);

--Insertion des données
INSERT INTO citations (texte,auteur) VALUES
('Il y a loin de la coupe aux lèvres', 'Anonyme'),
('640 ko de RAM devrait être suffisant pour toute application informatique future','Bill Gates'),
('N\'essaie pas de tout faire, fais une chose bien','Steve Jobs'),
('Suivez votre coeur mais vérifiez avec votre tête','Steve Jobs'),
('N\'essaie pas de tout faire, fais une chose bien','Steve Jobs');