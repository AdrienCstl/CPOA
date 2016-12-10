/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     10/12/2016 14:01:17                          */
/*==============================================================*/


alter table "Comprend"
   drop constraint FK_COMPREND_COMPREND_CONCOURS;

alter table "Comprend"
   drop constraint FK_COMPREND_COMPREND_FILM;

alter table "Concours"
   drop constraint FK_CONCOURS_JUGE_JURY;

alter table "Equipe_du_film"
   drop constraint FK_EQUIPE_D_LOGE_HEBERGEM;

alter table "Equipe_du_film"
   drop constraint FK_EQUIPE_D_COMPOSE_VIP;

alter table "Film"
   drop constraint FK_FILM_REALISE_EQUIPE_D;

alter table "Jury"
   drop constraint FK_JURY_APPARTIEN_VIP;

alter table "Jury"
   drop constraint FK_JURY_DORS_HEBERGEM;

alter table "Projection"
   drop constraint FK_PROJECTI_DEFINIT_FILM;

alter table "Projection"
   drop constraint FK_PROJECTI_A_LIEU_SALLE;

alter table "Reservation"
   drop constraint FK_RESERVAT_POSSEDE_HEBERGEM;

alter table "assiste"
   drop constraint FK_ASSISTE_ASSISTE_JURY;

alter table "assiste"
   drop constraint FK_ASSISTE_ASSISTE_PROJECTI;

alter table "propose"
   drop constraint FK_PROPOSE_PROPOSE_HEBERGEM;

alter table "propose"
   drop constraint FK_PROPOSE_PROPOSE_SERVICE;

drop index COMPREND_FK2;

drop index COMPREND_FK;

drop table "Comprend" cascade constraints;

drop index JUGE_FK;

drop table "Concours" cascade constraints;

drop index COMPOSE_FK;

drop index LOGE_FK;

drop table "Equipe_du_film" cascade constraints;

drop index REALISE_FK;

drop table "Film" cascade constraints;

drop table "Hebergement" cascade constraints;

drop index APPARTIENT_FK;

drop index DORS_FK;

drop table "Jury" cascade constraints;

drop index DEFINIT_FK;

drop index A_LIEU_FK;

drop table "Projection" cascade constraints;

drop index POSSEDE_FK;

drop table "Reservation" cascade constraints;

drop table "Salle" cascade constraints;

drop table "Service" cascade constraints;

drop index ASSISTE_FK2;

drop index ASSISTE_FK;

drop table "assiste" cascade constraints;

drop index PROPOSE_FK2;

drop index PROPOSE_FK;

drop table "propose" cascade constraints;

drop table "vip" cascade constraints;

/*==============================================================*/
/* Table: "Comprend"                                            */
/*==============================================================*/
create table "Comprend" 
(
   "IDfilm"             INTEGER              not null,
   "IDConcours"         INTEGER              not null,
   constraint PK_COMPREND primary key ("IDfilm", "IDConcours")
);

/*==============================================================*/
/* Index: COMPREND_FK                                           */
/*==============================================================*/
create index COMPREND_FK on "Comprend" (
   "IDfilm" ASC
);

/*==============================================================*/
/* Index: COMPREND_FK2                                          */
/*==============================================================*/
create index COMPREND_FK2 on "Comprend" (
   "IDConcours" ASC
);

/*==============================================================*/
/* Table: "Concours"                                            */
/*==============================================================*/
create table "Concours" 
(
   "Nom"                VARCHAR2(254),
   "IDConcours"         INTEGER              not null,
   "IDJury"             INTEGER              not null,
   "contrainteNombreFilmMin" INTEGER,
   constraint PK_CONCOURS primary key ("IDConcours")
);

/*==============================================================*/
/* Index: JUGE_FK                                               */
/*==============================================================*/
create index JUGE_FK on "Concours" (
   "IDJury" ASC
);

/*==============================================================*/
/* Table: "Equipe_du_film"                                      */
/*==============================================================*/
create table "Equipe_du_film" 
(
   "IDFilm"             INTEGER              not null,
   IDVIP                INTEGER,
   "IDHebergement"      INTEGER,
   constraint PK_EQUIPE_DU_FILM primary key ("IDFilm")
);

/*==============================================================*/
/* Index: LOGE_FK                                               */
/*==============================================================*/
create index LOGE_FK on "Equipe_du_film" (
   "IDHebergement" ASC
);

/*==============================================================*/
/* Index: COMPOSE_FK                                            */
/*==============================================================*/
create index COMPOSE_FK on "Equipe_du_film" (
   IDVIP ASC
);

/*==============================================================*/
/* Table: "Film"                                                */
/*==============================================================*/
create table "Film" 
(
   "titre"              VARCHAR2(254),
   "duree"              INTEGER,
   "IDfilm"             INTEGER              not null,
   "Equ_IDFilm"         INTEGER,
   "nb_de_projections"  INTEGER,
   constraint PK_FILM primary key ("IDfilm")
);

/*==============================================================*/
/* Index: REALISE_FK                                            */
/*==============================================================*/
create index REALISE_FK on "Film" (
   "Equ_IDFilm" ASC
);

/*==============================================================*/
/* Table: "Hebergement"                                         */
/*==============================================================*/
create table "Hebergement" 
(
   "type"               VARCHAR2(254),
   "nb_places_dispo"    INTEGER,
   "Nb_service"         INTEGER,
   "IDHebergement"      INTEGER              not null,
   constraint PK_HEBERGEMENT primary key ("IDHebergement")
);

/*==============================================================*/
/* Table: "Jury"                                                */
/*==============================================================*/
create table "Jury" 
(
   "nb__film_jour"      INTEGER,
   "nb_personnes"       INTEGER,
   "IDJury"             INTEGER              not null,
   "IDHebergement"      INTEGER,
   IDVIP                INTEGER,
   "contrainteNombreFilmMax" INTEGER,
   constraint PK_JURY primary key ("IDJury")
);

/*==============================================================*/
/* Index: DORS_FK                                               */
/*==============================================================*/
create index DORS_FK on "Jury" (
   "IDHebergement" ASC
);

/*==============================================================*/
/* Index: APPARTIENT_FK                                         */
/*==============================================================*/
create index APPARTIENT_FK on "Jury" (
   IDVIP ASC
);

/*==============================================================*/
/* Table: "Projection"                                          */
/*==============================================================*/
create table "Projection" 
(
   "date"               DATE,
   "horaire"            INTEGER,
   "type"               INTEGER,
   "IDProjection"       INTEGER              not null,
   "IDSalle"            INTEGER              not null,
   "IDfilm"             INTEGER              not null,
   constraint PK_PROJECTION primary key ("IDProjection")
);

/*==============================================================*/
/* Index: A_LIEU_FK                                             */
/*==============================================================*/
create index A_LIEU_FK on "Projection" (
   "IDSalle" ASC
);

/*==============================================================*/
/* Index: DEFINIT_FK                                            */
/*==============================================================*/
create index DEFINIT_FK on "Projection" (
   "IDfilm" ASC
);

/*==============================================================*/
/* Table: "Reservation"                                         */
/*==============================================================*/
create table "Reservation" 
(
   "IDReservation"      INTEGER              not null,
   "IDHebergement"      INTEGER,
   "nom"                VARCHAR2(254),
   "type"               VARCHAR2(254),
   "date"               DATE,
   "heureArrivee"       INTEGER,
   "heuredepart"        INTEGER,
   constraint PK_RESERVATION primary key ("IDReservation")
);

/*==============================================================*/
/* Index: POSSEDE_FK                                            */
/*==============================================================*/
create index POSSEDE_FK on "Reservation" (
   "IDHebergement" ASC
);

/*==============================================================*/
/* Table: "Salle"                                               */
/*==============================================================*/
create table "Salle" 
(
   "nb_places"          INTEGER,
   "nom"                VARCHAR2(254),
   "IDSalle"            INTEGER              not null,
   constraint PK_SALLE primary key ("IDSalle")
);

/*==============================================================*/
/* Table: "Service"                                             */
/*==============================================================*/
create table "Service" 
(
   "nom"                VARCHAR2(254)        not null,
   constraint PK_SERVICE primary key ("nom")
);

/*==============================================================*/
/* Table: "assiste"                                             */
/*==============================================================*/
create table "assiste" 
(
   "IDJury"             INTEGER              not null,
   "IDProjection"       INTEGER              not null,
   constraint PK_ASSISTE primary key ("IDJury", "IDProjection")
);

/*==============================================================*/
/* Index: ASSISTE_FK                                            */
/*==============================================================*/
create index ASSISTE_FK on "assiste" (
   "IDJury" ASC
);

/*==============================================================*/
/* Index: ASSISTE_FK2                                           */
/*==============================================================*/
create index ASSISTE_FK2 on "assiste" (
   "IDProjection" ASC
);

/*==============================================================*/
/* Table: "propose"                                             */
/*==============================================================*/
create table "propose" 
(
   "nom"                VARCHAR2(254)        not null,
   "IDHebergement"      INTEGER              not null,
   constraint PK_PROPOSE primary key ("nom", "IDHebergement")
);

/*==============================================================*/
/* Index: PROPOSE_FK                                            */
/*==============================================================*/
create index PROPOSE_FK on "propose" (
   "nom" ASC
);

/*==============================================================*/
/* Index: PROPOSE_FK2                                           */
/*==============================================================*/
create index PROPOSE_FK2 on "propose" (
   "IDHebergement" ASC
);

/*==============================================================*/
/* Table: "vip"                                                 */
/*==============================================================*/
create table "vip" 
(
   "type"               VARCHAR2(254),
   IDVIP                INTEGER              not null,
   "nationalite"        VARCHAR2(254),
   "nom"                VARCHAR2(254),
   "prenom"             VARCHAR2(254),
   constraint PK_VIP primary key (IDVIP)
);

alter table "Comprend"
   add constraint FK_COMPREND_COMPREND_CONCOURS foreign key ("IDConcours")
      references "Concours" ("IDConcours");

alter table "Comprend"
   add constraint FK_COMPREND_COMPREND_FILM foreign key ("IDfilm")
      references "Film" ("IDfilm");

alter table "Concours"
   add constraint FK_CONCOURS_JUGE_JURY foreign key ("IDJury")
      references "Jury" ("IDJury");

alter table "Equipe_du_film"
   add constraint FK_EQUIPE_D_LOGE_HEBERGEM foreign key ("IDHebergement")
      references "Hebergement" ("IDHebergement");

alter table "Equipe_du_film"
   add constraint FK_EQUIPE_D_COMPOSE_VIP foreign key (IDVIP)
      references "vip" (IDVIP);

alter table "Film"
   add constraint FK_FILM_REALISE_EQUIPE_D foreign key ("Equ_IDFilm")
      references "Equipe_du_film" ("IDFilm");

alter table "Jury"
   add constraint FK_JURY_APPARTIEN_VIP foreign key (IDVIP)
      references "vip" (IDVIP);

alter table "Jury"
   add constraint FK_JURY_DORS_HEBERGEM foreign key ("IDHebergement")
      references "Hebergement" ("IDHebergement");

alter table "Projection"
   add constraint FK_PROJECTI_DEFINIT_FILM foreign key ("IDfilm")
      references "Film" ("IDfilm");

alter table "Projection"
   add constraint FK_PROJECTI_A_LIEU_SALLE foreign key ("IDSalle")
      references "Salle" ("IDSalle");

alter table "Reservation"
   add constraint FK_RESERVAT_POSSEDE_HEBERGEM foreign key ("IDHebergement")
      references "Hebergement" ("IDHebergement");

alter table "assiste"
   add constraint FK_ASSISTE_ASSISTE_JURY foreign key ("IDJury")
      references "Jury" ("IDJury");

alter table "assiste"
   add constraint FK_ASSISTE_ASSISTE_PROJECTI foreign key ("IDProjection")
      references "Projection" ("IDProjection");

alter table "propose"
   add constraint FK_PROPOSE_PROPOSE_HEBERGEM foreign key ("IDHebergement")
      references "Hebergement" ("IDHebergement");

alter table "propose"
   add constraint FK_PROPOSE_PROPOSE_SERVICE foreign key ("nom")
      references "Service" ("nom");

