drop table if exists artistas cascade;

create table artistas
(
    id               bigserial         primary key
,   nombre      varchar(255)  not null constraint uq_usuario_unico unique
-- ,   tema_id      bigint             not null constraint fk_artistas_temas
--                                              references temas (id)
--                                              on delete no action on update cascade
-- ,   album_id      bigint          not null constraint fk_artistas_albumes
--                                             references albumes (id)
--                                             on delete no action on update cascade
);

drop table if exists albumes cascade;

create table albumes
(
        id              bigserial        primary key
    ,   titulo        varchar(255)  not null unique
    ,   artista_id  bigint             not null constraint fk_albumes_artistas
                                                references artistas (id)
                                                on delete no action on update cascade
    -- ,   tema_id  bigint               not null constraint fk_albumes_temas
    --                                             references temas (id)
    --                                             on delete no action on update cascade
);

drop table if exists temas cascade;

create table temas (
    id                  bigserial         primary key
,   titulo             varchar(255)  not null unique
,   artista_id      bigint             not null constraint fk_temas_artitas
                                                references artistas (id)
                                                on delete no action on update cascade
,   album_id  bigint                  not null constraint fk_temas_albumes
                                                references albumes (id)
                                                on delete no action on update cascade
,   duracion        numeric(6)
);
