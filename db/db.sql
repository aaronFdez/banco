drop table if exists artistas cascade;

create table artistas
(
    id               bigserial         primary key
,   nombre      varchar(255)  not null constraint uq_usuario_unico unique
,   foto            varchar(255)
);

insert into artistas (nombre,foto)
    values ('Manolo García', 'http://asunvanessa.files.wordpress.com/2011/01/manolo20garcia.jpg'),
                ('Pink', 'https://i.ytimg.com/vi/UPSrQkAvyBQ/maxresdefault.jpg'),
                ('el Arrebato', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJFkGhJHPVoypvByrk7zckct7BeLCJ10Uj3dpqWtq9ZQ2AleEzxA');

drop table if exists albumes cascade;

create table albumes
(
        id              bigserial        primary key
    ,   titulo        varchar(255)  not null unique
    ,   artista_id  bigint             not null constraint fk_albumes_artistas
                                                references artistas (id)
                                                on delete no action on update cascade
    ,   foto          varchar(255)
);

insert into albumes (titulo, artista_id, foto)
    values ('Todo es ahora', '1', 'https://s.mxmcdn.net/images-storage/albums5/2/4/3/0/0/7/32700342_350_350.jpg'),
                ('The Truth About Love', '2', 'http://images.coveralia.com/audio/p/Pink-The_Truth_About_Love-Trasera.jpg'),
                ('Que salga el sol por donde quiera', '3', 'Que salga el sol por donde quiera');

drop table if exists temas cascade;

create table temas (
    id                  bigserial         primary key
,   titulo             varchar(255)  not null unique
,   artista_id      bigint             not null constraint fk_temas_artitas
                                                references artistas (id)
                                                on delete no action on update cascade
,   album_id      bigint              not null constraint fk_temas_albumes
                                                references albumes (id)
                                                on delete no action on update cascade
,   duracion        numeric(6)
,   foto                varchar(255)
);

insert into temas (titulo, artista_id, album_id, duracion)
    values ('Caminaré', '1', '1', 234 ),
                ('Campanadas de libertad', '1', '1',225 ),
                ('Es mejor sentir', '1' , '1', 220),
                ('Blow Me One Last Kiss', '2', '2', 255 ),
                ('Try', '2', '2', 248 ),
                ('Just Give Me a Reason', '2', '2', 243 ),
                ('Búscate un hombre que te quiera', '3', '3', 230 ),
                ('Sólo con decirte guapa', '3', '3', 252 ),
                ('Himno del Centenario del Sevilla FC', '3', '3', 200 );
