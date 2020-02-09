--STEP PATCH
--buka database db_diagnosa_kucing
--buka tab SQL
--copy paste query dibawah lalu go/kirim
--kalo error langsung info


--
--hapus id_penyakit_kucing di solusi
--
ALTER TABLE `penyakit_kucing` DROP FOREIGN KEY `penyakit_kucing_ibfk_1`;
ALTER TABLE `penyakit_kucing` DROP COLUMN `id_solusi`;

DROP TABLE `solusi`;
ALTER TABLE `penyakit_kucing` ADD `solusi` TEXT NOT NULL ;