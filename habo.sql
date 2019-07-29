create database db_bancodesangue;
use db_bancodesangue;

create table tb_genero(
cd_genero int primary key auto_increment,
nm_genero varchar (100)
);

create table tb_estado(
cd_estado int primary key auto_increment,
nm_estado varchar (100)
);

create table tb_estadocivil(
cd_estadocivil int primary key auto_increment,
nm_estadocivil varchar (100)
);

create table tb_tiposanguineo(
cd_tiposanguineo int primary key auto_increment,
nm_tiposanguineo varchar(3)
);

create table tb_usuario(
cd_usuario int primary key auto_increment,
nm_usuario varchar(100),
dt_nascimento date,
ds_cpf varchar (11),
id_genero int, 
foreign key (id_genero) references tb_genero (cd_genero),
ds_enedereco varchar (100),
ds_numero varchar (100),
ds_complemento varchar (100), 
nm_bairro varchar (100),
id_estado int,
foreign key (id_estado) references tb_estado (cd_estado),
ds_cidade varchar (100),
ds_cep varchar (8),
ds_telefone varchar (11),
id_estadocivil int,
foreign key (id_estadocivil) references tb_estadocivil (cd_estadocivil),
ds_foto varchar (1000),
ds_email varchar (100), 
ds_senha varchar (15),
id_sangue int,
foreign key (id_sangue) references tb_tiposanguineo (cd_tiposanguineo),
ds_doador varchar (1),
dt_ultimadoacao date,
ds_tatuagem varchar (1),
ds_gestante varchar (1),
ds_viagem varchar (1),
ds_vacina varchar (1), 
ds_doencac varchar (1),
ds_drogas varchar (1),
ds_malaria varchar (1)
);


create table tb_hospital(
cd_hopital int primary key auto_increment,
nm_hospital varchar (100),
nm_fantasia varchar (100),
ds_cnpj varchar (14),
ds_telefone varchar (11),
ds_enedereco varchar (100),
ds_numero varchar (100),
ds_complemento varchar (100), 
nm_bairro varchar (100),
id_estado int,
foreign key (id_estado) references tb_estado (cd_estado),
ds_cidade varchar (100),
ds_cep varchar (8),
ds_foto varchar (1000),
ds_email varchar (100), 
ds_senha varchar (15)
);

create table tb_agendamento(
cd_agendamento int primary key auto_increment,
id_usuario int,
foreign key (id_usuario) references tb_usuario (cd_usuario),
id_hospital int,
foreign key (id_hospital) references tb_hospital (cd_hopital),
ds_dataagendamento date,
ds_horario time
);


create table tb_notificacao(
cd_notificacao int primary key auto_increment,
id_usuario int,
foreign key (id_usuario) references tb_usuario (cd_usuario),
ds_mensagem varchar(10000),
dt_notificacao date
);


create table tb_paciente(
cd_paciente int primary key auto_increment,
id_usuario int,
foreign key (id_usuario) references tb_usuario (cd_usuario),
nm_paciente varchar (100),
id_sangue int,
foreign key (id_sangue) references tb_tiposanguineo (cd_tiposanguineo),
ds_paciente varchar(1000),
ds_foto varchar(1000),
nm_hospital varchar(1000)
); 






  
