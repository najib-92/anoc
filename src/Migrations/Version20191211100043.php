<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211100043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mvtcaissegrpt (MVTCAISSEGRPTID INT AUTO_INCREMENT NOT NULL, DATEOPERATION DATE DEFAULT NULL, LIBELLEOPERATION TEXT DEFAULT NULL, MONTANTRECETTE DOUBLE PRECISION DEFAULT NULL, MONTANTDEPENCE DOUBLE PRECISION DEFAULT NULL, OPERATIONFAITEPAR TEXT DEFAULT NULL, PIECEJUSTIFICATIVE TEXT DEFAULT NULL, GROUPEMENTID INT DEFAULT NULL, INDEX FK_RELATIONSHIP_80 (GROUPEMENTID), PRIMARY KEY(MVTCAISSEGRPTID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mvtbanquegroupement (BA9ARAID INT AUTO_INCREMENT NOT NULL, DATEOPERATION DATE DEFAULT NULL, LIBELLEOPERATION TEXT DEFAULT NULL, MONTANTRECETTE DOUBLE PRECISION DEFAULT NULL, MONTANTDEPENCE DOUBLE PRECISION DEFAULT NULL, NUMCHEQUE VARCHAR(255) DEFAULT NULL, OPERATIONFAITEPAR TEXT DEFAULT NULL, PIECEJUSTIFICATIVE TEXT DEFAULT NULL, PRIMARY KEY(BA9ARAID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relationship_46 (BA9ARAID INT NOT NULL, BANQUEID INT NOT NULL, INDEX IDX_A631C5A9EA5612B3 (BA9ARAID), INDEX IDX_A631C5A964F282D (BANQUEID), PRIMARY KEY(BA9ARAID, BANQUEID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mvt_bnq_grpt (MVT_BNQ_GRPT_ID INT AUTO_INCREMENT NOT NULL, DATEOPERATION DATE DEFAULT NULL, LIBELLEOPERATION TEXT DEFAULT NULL, MONTANTOPERATION DOUBLE PRECISION DEFAULT NULL, MONTANTDEPENCE DOUBLE PRECISION DEFAULT NULL, OPERATIONFAITEPAR TEXT DEFAULT NULL, PIECEJUSTIFICATIVE TEXT DEFAULT NULL, GROUPEMENTID INT DEFAULT NULL, INDEX FK_RELATIONSHIP_81 (GROUPEMENTID), PRIMARY KEY(MVT_BNQ_GRPT_ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE indemnitetechnicien (INDEMNITETECHNICIENID INT AUTO_INCREMENT NOT NULL, SOMMERECU DOUBLE PRECISION DEFAULT NULL, MOISTOURNNEE TEXT DEFAULT NULL, CHEQUENUMERO TEXT DEFAULT NULL, BANQUE TEXT DEFAULT NULL, OBS TEXT DEFAULT NULL, TECHNICIENID INT DEFAULT NULL, INDEX FK_RELATIONSHIP_62 (TECHNICIENID), PRIMARY KEY(INDEMNITETECHNICIENID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mvtcaissegrpt ADD CONSTRAINT FK_F57C9A70683C1BD5 FOREIGN KEY (GROUPEMENTID) REFERENCES groupements (GROUPEMENTID)');
        $this->addSql('ALTER TABLE relationship_46 ADD CONSTRAINT FK_A631C5A9EA5612B3 FOREIGN KEY (BA9ARAID) REFERENCES mvtbanquegroupement (BA9ARAID)');
        $this->addSql('ALTER TABLE relationship_46 ADD CONSTRAINT FK_A631C5A964F282D FOREIGN KEY (BANQUEID) REFERENCES banques (BANQUEID)');
        $this->addSql('ALTER TABLE mvt_bnq_grpt ADD CONSTRAINT FK_335F312B683C1BD5 FOREIGN KEY (GROUPEMENTID) REFERENCES groupements (GROUPEMENTID)');
        $this->addSql('ALTER TABLE indemnitetechnicien ADD CONSTRAINT FK_D1A9CD3C441FD482 FOREIGN KEY (TECHNICIENID) REFERENCES techniciens (TECHNICIENID)');
        $this->addSql('DROP TABLE indemnitetechniciens');
        $this->addSql('DROP TABLE mvtbanquegroupements');
        $this->addSql('DROP TABLE mvtcaissegroupements');
        $this->addSql('DROP INDEX fk_relationship_29 ON reunionbureaugrpt');
        $this->addSql('DROP INDEX fk_relationship_55 ON troupeauxdebase');
        $this->addSql('DROP INDEX fk_relationship_50 ON superviseurs');
        $this->addSql('CREATE INDEX IDX_C82DC47ED34D535B ON relationship_57 (HISTOSUPERVISEURID)');
        $this->addSql('ALTER TABLE relationship_57 RENAME INDEX fk_relationship_58 TO IDX_C82DC47E932897C2');
        $this->addSql('DROP INDEX fk_relationship_76 ON relationship_71');
        $this->addSql('ALTER TABLE droitsfinanciersgrpt CHANGE groupementid GROUPEMENTID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupements ADD TECHNICIENID INT DEFAULT NULL, CHANGE secteurid SECTEURID INT DEFAULT NULL, CHANGE groupementmereid GROUPEMENTMEREID VARCHAR(255) DEFAULT NULL, CHANGE effectifovinencadre EFFECTIFOVINENCADRE VARCHAR(255) DEFAULT NULL, CHANGE effectifcaprinencadre EFFECTIFCAPRINENCADRE VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE INDEX FK_RELATIONSHIP_56 ON groupements (TECHNICIENID)');
        $this->addSql('CREATE INDEX IDX_7714C6CD683C1BD5 ON relationship_31 (GROUPEMENTID)');
        $this->addSql('ALTER TABLE relationship_31 RENAME INDEX fk_relationship_33 TO IDX_7714C6CD2F887677');
        $this->addSql('ALTER TABLE regionsprojets CHANGE projetid PROJETID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE regionsprojets RENAME INDEX fk_relationship_74 TO FK_RELATIONSHIP_77');
        $this->addSql('DROP INDEX fk_relationship_73 ON relationship_69');
        $this->addSql('ALTER TABLE delegationpouvoirs CHANGE eleveurid ELEVEURID INT DEFAULT NULL, CHANGE groupementid GROUPEMENTID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delegationpouvoirs RENAME INDEX fk_relationship_43 TO FK_RELATIONSHIP_50');
        $this->addSql('ALTER TABLE delegationpouvoirs RENAME INDEX fk_relationship_42 TO FK_RELATIONSHIP_46');
        $this->addSql('ALTER TABLE bureauxanoc CHANGE conseilanocid CONSEILANOCID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE indicateursdesconventions RENAME INDEX fk_relationship_69 TO FK_RELATIONSHIP_72');
        $this->addSql('DROP INDEX fk_relationship_66 ON relationship_63');
        $this->addSql('ALTER TABLE alimentationcaissegrpt CHANGE groupementid GROUPEMENTID INT DEFAULT NULL');
        $this->addSql('DROP INDEX fk_relationship_64 ON relationship_62');
        $this->addSql('ALTER TABLE comptesrendusprospections CHANGE con_conventionid CON_CONVENTIONID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comptesrendusprospections RENAME INDEX fk_relationship_60 TO FK_RELATIONSHIP_63');
        $this->addSql('ALTER TABLE batimentselevegeeleveursprospectes RENAME INDEX fk_relationship_71 TO FK_RELATIONSHIP_74');
        $this->addSql('ALTER TABLE conseilgroupement CHANGE responsabiliteid RESPONSABILITEID INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_1E650303A71AAEBF ON relationship_24 (CONSEILGROUPEMENTID)');
        $this->addSql('ALTER TABLE relationship_24 RENAME INDEX fk_relationship_25 TO IDX_1E650303932897C2');
        $this->addSql('ALTER TABLE recuseleveurs CHANGE eleveurid ELEVEURID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recuseleveurs RENAME INDEX fk_relationship_79 TO FK_RELATIONSHIP_41');
        $this->addSql('DROP INDEX fk_relationship_62 ON relationship_61');
        $this->addSql('ALTER TABLE relationship_61 DROP PRIMARY KEY');
        $this->addSql('CREATE INDEX IDX_A633288A66F6AB9 ON relationship_61 (CONVENTIONID)');
        $this->addSql('ALTER TABLE relationship_61 ADD PRIMARY KEY (ACTIVITECONVENTIONID, CONVENTIONID)');
        $this->addSql('ALTER TABLE bureauxgroupements CHANGE groupementid GROUPEMENTID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE droitcotisation CHANGE groupementid GROUPEMENTID INT DEFAULT NULL, CHANGE eleveurid ELEVEURID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE droitcotisation RENAME INDEX fk_relationship_41 TO FK_RELATIONSHIP_42');
        $this->addSql('DROP INDEX fk_relationship_67 ON versementscontributions');
        $this->addSql('ALTER TABLE financementsconventions CHANGE con_conventionid CON_CONVENTIONID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE financementsconventions RENAME INDEX fk_relationship_68 TO FK_RELATIONSHIP_71');
        $this->addSql('ALTER TABLE douars CHANGE secteurid SECTEURID INT DEFAULT NULL, CHANGE provinceid PROVINCEID INT DEFAULT NULL');
        $this->addSql('DROP INDEX fk_relationship_51 ON villes');
        $this->addSql('DROP INDEX fk_relation ON villes');
        $this->addSql('DROP INDEX fk_technicien_personnel ON techniciens');
        $this->addSql('DROP INDEX fk_technicein_groupement ON techniciens');
        $this->addSql('ALTER TABLE techniciens DROP groupementid, CHANGE personnelid PERSONNELID INT NOT NULL');
        $this->addSql('ALTER TABLE conseilanoc CHANGE bureauxanocid BUREAUXANOCID INT DEFAULT NULL, CHANGE responsabiliteid RESPONSABILITEID INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_707902D478C32991 ON relationship_35 (CONSEILANOCID)');
        $this->addSql('ALTER TABLE relationship_35 RENAME INDEX fk_relationship_36 TO IDX_707902D4932897C2');
        $this->addSql('DROP INDEX fk_relationship_16 ON eleveurs');
        $this->addSql('ALTER TABLE eleveurs DROP sec_secteurid, CHANGE secteurid SECTEURID INT DEFAULT NULL, CHANGE villeid VILLEID INT DEFAULT NULL, CHANGE douarid DOUARID INT DEFAULT NULL, CHANGE groupementid GROUPEMENTID INT DEFAULT NULL, CHANGE effectifovin EFFECTIFOVIN VARCHAR(255) DEFAULT NULL, CHANGE effectifcaprin EFFECTIFCAPRIN VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_EE1D9777932897C2 ON relationship_32 (ELEVEURID)');
        $this->addSql('ALTER TABLE relationship_32 RENAME INDEX fk_relationship_38 TO IDX_EE1D97772F887677');
        $this->addSql('ALTER TABLE alimentationscheptel CHANGE con_conventionid CON_CONVENTIONID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE alimentationscheptel RENAME INDEX fk_relationship_70 TO FK_RELATIONSHIP_73');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE relationship_46 DROP FOREIGN KEY FK_A631C5A9EA5612B3');
        $this->addSql('CREATE TABLE indemnitetechniciens (indemnitetechnicienid INT AUTO_INCREMENT NOT NULL, technicienid INT DEFAULT NULL, sommerecu DOUBLE PRECISION DEFAULT NULL, moistournnee MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, chequenumero MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, banque MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, obs MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_relationship_56 (technicienid), PRIMARY KEY(indemnitetechnicienid)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mvtbanquegroupements (mvtbanquegroupementsid INT AUTO_INCREMENT NOT NULL, groupementid INT DEFAULT NULL, date DATE DEFAULT NULL, libelleoperation MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, montantrecette VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, montantdepence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, operationfaitepar MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, piecejustificative MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, numerocheque INT DEFAULT NULL, INDEX fk_relationship_78 (groupementid), PRIMARY KEY(mvtbanquegroupementsid)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mvtcaissegroupements (mvtcaissegroupementsid INT AUTO_INCREMENT NOT NULL, groupementid INT DEFAULT NULL, date DATE DEFAULT NULL, libelleoperation MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, montantrecette VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, montantdepence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, operationfaitepar MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, piecejustificative MEDIUMTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_relationship_77 (groupementid), PRIMARY KEY(mvtcaissegroupementsid)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE mvtcaissegrpt');
        $this->addSql('DROP TABLE mvtbanquegroupement');
        $this->addSql('DROP TABLE relationship_46');
        $this->addSql('DROP TABLE mvt_bnq_grpt');
        $this->addSql('DROP TABLE indemnitetechnicien');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE alimentationcaissegrpt DROP FOREIGN KEY FK_F715B088683C1BD5');
        $this->addSql('ALTER TABLE alimentationcaissegrpt CHANGE GROUPEMENTID groupementid INT NOT NULL');
        $this->addSql('ALTER TABLE alimentationscheptel DROP FOREIGN KEY FK_8DB6BCD3C1C5D5E');
        $this->addSql('ALTER TABLE alimentationscheptel CHANGE CON_CONVENTIONID con_conventionid INT NOT NULL');
        $this->addSql('ALTER TABLE alimentationscheptel RENAME INDEX fk_relationship_73 TO fk_relationship_70');
        $this->addSql('ALTER TABLE batimentselevegeeleveursprospectes DROP FOREIGN KEY FK_38C35987C1C5D5E');
        $this->addSql('ALTER TABLE batimentselevegeeleveursprospectes RENAME INDEX fk_relationship_74 TO fk_relationship_71');
        $this->addSql('ALTER TABLE bureauxanoc DROP FOREIGN KEY FK_7D80D4AE78C32991');
        $this->addSql('ALTER TABLE bureauxanoc CHANGE CONSEILANOCID conseilanocid INT NOT NULL');
        $this->addSql('ALTER TABLE bureauxgroupements DROP FOREIGN KEY FK_5D0AF27F683C1BD5');
        $this->addSql('ALTER TABLE bureauxgroupements CHANGE GROUPEMENTID groupementid INT NOT NULL');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A59FA43474');
        $this->addSql('ALTER TABLE comptesrendusprospections DROP FOREIGN KEY FK_26FA7E2EC1C5D5E');
        $this->addSql('ALTER TABLE comptesrendusprospections CHANGE CON_CONVENTIONID con_conventionid INT NOT NULL');
        $this->addSql('ALTER TABLE comptesrendusprospections RENAME INDEX fk_relationship_63 TO fk_relationship_60');
        $this->addSql('ALTER TABLE conseilanoc DROP FOREIGN KEY FK_69994437284F9F9F');
        $this->addSql('ALTER TABLE conseilanoc DROP FOREIGN KEY FK_69994437A0BB29FA');
        $this->addSql('ALTER TABLE conseilanoc CHANGE BUREAUXANOCID bureauxanocid INT NOT NULL, CHANGE RESPONSABILITEID responsabiliteid INT NOT NULL');
        $this->addSql('ALTER TABLE conseilgroupement DROP FOREIGN KEY FK_B0D27E8DA0BB29FA');
        $this->addSql('ALTER TABLE conseilgroupement DROP FOREIGN KEY FK_B0D27E8D331D6C80');
        $this->addSql('ALTER TABLE conseilgroupement CHANGE RESPONSABILITEID responsabiliteid INT NOT NULL');
        $this->addSql('ALTER TABLE delegationpouvoirs DROP FOREIGN KEY FK_6D91F7F8932897C2');
        $this->addSql('ALTER TABLE delegationpouvoirs DROP FOREIGN KEY FK_6D91F7F8683C1BD5');
        $this->addSql('ALTER TABLE delegationpouvoirs CHANGE ELEVEURID eleveurid INT NOT NULL, CHANGE GROUPEMENTID groupementid INT NOT NULL');
        $this->addSql('ALTER TABLE delegationpouvoirs RENAME INDEX fk_relationship_50 TO fk_relationship_43');
        $this->addSql('ALTER TABLE delegationpouvoirs RENAME INDEX fk_relationship_46 TO fk_relationship_42');
        $this->addSql('ALTER TABLE douars DROP FOREIGN KEY FK_F834C6387DA52323');
        $this->addSql('ALTER TABLE douars DROP FOREIGN KEY FK_F834C638D6ECFFB3');
        $this->addSql('ALTER TABLE douars CHANGE SECTEURID secteurid INT NOT NULL, CHANGE PROVINCEID provinceid INT NOT NULL');
        $this->addSql('ALTER TABLE droitcotisation DROP FOREIGN KEY FK_8BFD9697932897C2');
        $this->addSql('ALTER TABLE droitcotisation DROP FOREIGN KEY FK_8BFD9697683C1BD5');
        $this->addSql('ALTER TABLE droitcotisation CHANGE ELEVEURID eleveurid INT NOT NULL, CHANGE GROUPEMENTID groupementid INT NOT NULL');
        $this->addSql('ALTER TABLE droitcotisation RENAME INDEX fk_relationship_42 TO fk_relationship_41');
        $this->addSql('ALTER TABLE droitfonctionement DROP FOREIGN KEY FK_D009A83C7DA52323');
        $this->addSql('ALTER TABLE droitsfinanciersgrpt DROP FOREIGN KEY FK_1D36ED9B683C1BD5');
        $this->addSql('ALTER TABLE droitsfinanciersgrpt CHANGE GROUPEMENTID groupementid INT NOT NULL');
        $this->addSql('ALTER TABLE eleveurs DROP FOREIGN KEY FK_15534AD9683C1BD5');
        $this->addSql('ALTER TABLE eleveurs DROP FOREIGN KEY FK_15534AD97DA52323');
        $this->addSql('ALTER TABLE eleveurs DROP FOREIGN KEY FK_15534AD99FA43474');
        $this->addSql('ALTER TABLE eleveurs DROP FOREIGN KEY FK_15534AD93F4FC255');
        $this->addSql('ALTER TABLE eleveurs ADD sec_secteurid INT NOT NULL, CHANGE EFFECTIFOVIN effectifovin NUMERIC(8, 0) DEFAULT NULL, CHANGE EFFECTIFCAPRIN effectifcaprin NUMERIC(8, 0) DEFAULT NULL, CHANGE GROUPEMENTID groupementid INT NOT NULL, CHANGE SECTEURID secteurid INT NOT NULL, CHANGE VILLEID villeid INT NOT NULL, CHANGE DOUARID douarid INT NOT NULL');
        $this->addSql('CREATE INDEX fk_relationship_16 ON eleveurs (sec_secteurid)');
        $this->addSql('ALTER TABLE financementsconventions DROP FOREIGN KEY FK_1351E23AC1C5D5E');
        $this->addSql('ALTER TABLE financementsconventions CHANGE CON_CONVENTIONID con_conventionid INT NOT NULL');
        $this->addSql('ALTER TABLE financementsconventions RENAME INDEX fk_relationship_71 TO fk_relationship_68');
        $this->addSql('ALTER TABLE groupements DROP FOREIGN KEY FK_9EA336227DA52323');
        $this->addSql('ALTER TABLE groupements DROP FOREIGN KEY FK_9EA33622441FD482');
        $this->addSql('DROP INDEX FK_RELATIONSHIP_56 ON groupements');
        $this->addSql('ALTER TABLE groupements DROP TECHNICIENID, CHANGE GROUPEMENTMEREID groupementmereid NUMERIC(8, 0) DEFAULT NULL, CHANGE EFFECTIFOVINENCADRE effectifovinencadre NUMERIC(8, 0) DEFAULT NULL, CHANGE EFFECTIFCAPRINENCADRE effectifcaprinencadre NUMERIC(8, 0) DEFAULT NULL, CHANGE SECTEURID secteurid INT NOT NULL');
        $this->addSql('ALTER TABLE indicateursdesconventions DROP FOREIGN KEY FK_37499BAD736CCF91');
        $this->addSql('ALTER TABLE indicateursdesconventions RENAME INDEX fk_relationship_72 TO fk_relationship_69');
        $this->addSql('ALTER TABLE recuseleveurs DROP FOREIGN KEY FK_5244010932897C2');
        $this->addSql('ALTER TABLE recuseleveurs DROP FOREIGN KEY FK_5244010441FD482');
        $this->addSql('ALTER TABLE recuseleveurs CHANGE ELEVEURID eleveurid INT NOT NULL');
        $this->addSql('ALTER TABLE recuseleveurs RENAME INDEX fk_relationship_41 TO fk_relationship_79');
        $this->addSql('ALTER TABLE regionsprojets DROP FOREIGN KEY FK_19FC745FF7673C6');
        $this->addSql('ALTER TABLE regionsprojets CHANGE PROJETID projetid INT NOT NULL');
        $this->addSql('ALTER TABLE regionsprojets RENAME INDEX fk_relationship_77 TO fk_relationship_74');
        $this->addSql('ALTER TABLE relationship_24 DROP FOREIGN KEY FK_1E650303A71AAEBF');
        $this->addSql('ALTER TABLE relationship_24 DROP FOREIGN KEY FK_1E650303932897C2');
        $this->addSql('DROP INDEX IDX_1E650303A71AAEBF ON relationship_24');
        $this->addSql('ALTER TABLE relationship_24 RENAME INDEX idx_1e650303932897c2 TO fk_relationship_25');
        $this->addSql('ALTER TABLE relationship_31 DROP FOREIGN KEY FK_7714C6CD683C1BD5');
        $this->addSql('ALTER TABLE relationship_31 DROP FOREIGN KEY FK_7714C6CD2F887677');
        $this->addSql('DROP INDEX IDX_7714C6CD683C1BD5 ON relationship_31');
        $this->addSql('ALTER TABLE relationship_31 RENAME INDEX idx_7714c6cd2f887677 TO fk_relationship_33');
        $this->addSql('ALTER TABLE relationship_32 DROP FOREIGN KEY FK_EE1D9777932897C2');
        $this->addSql('ALTER TABLE relationship_32 DROP FOREIGN KEY FK_EE1D97772F887677');
        $this->addSql('DROP INDEX IDX_EE1D9777932897C2 ON relationship_32');
        $this->addSql('ALTER TABLE relationship_32 RENAME INDEX idx_ee1d97772f887677 TO fk_relationship_38');
        $this->addSql('ALTER TABLE relationship_35 DROP FOREIGN KEY FK_707902D478C32991');
        $this->addSql('ALTER TABLE relationship_35 DROP FOREIGN KEY FK_707902D4932897C2');
        $this->addSql('DROP INDEX IDX_707902D478C32991 ON relationship_35');
        $this->addSql('ALTER TABLE relationship_35 RENAME INDEX idx_707902d4932897c2 TO fk_relationship_36');
        $this->addSql('ALTER TABLE relationship_57 DROP FOREIGN KEY FK_C82DC47ED34D535B');
        $this->addSql('ALTER TABLE relationship_57 DROP FOREIGN KEY FK_C82DC47E932897C2');
        $this->addSql('DROP INDEX IDX_C82DC47ED34D535B ON relationship_57');
        $this->addSql('ALTER TABLE relationship_57 RENAME INDEX idx_c82dc47e932897c2 TO fk_relationship_58');
        $this->addSql('ALTER TABLE relationship_61 DROP FOREIGN KEY FK_A633288A66F6AB9');
        $this->addSql('DROP INDEX IDX_A633288A66F6AB9 ON relationship_61');
        $this->addSql('ALTER TABLE relationship_61 DROP PRIMARY KEY');
        $this->addSql('CREATE INDEX fk_relationship_62 ON relationship_61 (activiteconventionid)');
        $this->addSql('ALTER TABLE relationship_61 ADD PRIMARY KEY (conventionid, activiteconventionid)');
        $this->addSql('CREATE INDEX fk_relationship_64 ON relationship_62 (partenaireconventionid)');
        $this->addSql('CREATE INDEX fk_relationship_66 ON relationship_63 (objectifdeconventionid)');
        $this->addSql('CREATE INDEX fk_relationship_73 ON relationship_69 (partenaireconventionid)');
        $this->addSql('CREATE INDEX fk_relationship_76 ON relationship_71 (regionprojetid)');
        $this->addSql('CREATE INDEX fk_relationship_29 ON reunionbureaugrpt (groupementid)');
        $this->addSql('CREATE INDEX fk_relationship_50 ON superviseurs (personnelid)');
        $this->addSql('ALTER TABLE techniciens ADD groupementid INT NOT NULL, CHANGE PERSONNELID personnelid INT DEFAULT NULL');
        $this->addSql('CREATE INDEX fk_technicien_personnel ON techniciens (personnelid)');
        $this->addSql('CREATE INDEX fk_technicein_groupement ON techniciens (groupementid)');
        $this->addSql('CREATE INDEX fk_relationship_55 ON troupeauxdebase (ele_eleveurid)');
        $this->addSql('CREATE INDEX fk_relationship_67 ON versementscontributions (conventionid)');
        $this->addSql('CREATE INDEX fk_relationship_51 ON villes (provinceid)');
        $this->addSql('CREATE INDEX fk_relation ON villes (secteurid)');
    }
}
