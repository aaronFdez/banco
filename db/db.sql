drop table if exists usuarios cascade;

create table usuarios (
id         bigserial   constraint pk_usuarios primary key,
nombre     varchar(20) not null constraint uq_usuario_unico unique,
password   varchar(32) not null
);

insert into usuarios (nombre, password)
    values ('pepe','pepe'),('aaron','aaron');

drop table if exists cuentas cascade;

create table cuentas (
id             bigserial    constraint pk_cuentas primary key,
fecha_apertura timestamp    not null default current_timestamp,
numero         numeric(20)  not null unique,
orig_id        bigint       not null constraint fk_cuentas_usuarios
                            references usuarios (id)
                            on delete no action on update cascade
);

insert into cuentas (orig_id, numero)
    values (1, 12345678912345678978), (1, 96583214536547896587), (2, 22222222222222222222);

drop table if exists movimientos cascade;

create table movimientos (
id              bigserial    constraint pk_movimientos primary key,
fecha_operacion timestamp    not null default current_timestamp,
cuenta_id       bigint       not null constraint fk_moviemientos_cuentas
                             references cuentas (id)
                             on delete no action on update cascade,
concepto        varchar(20)  not null,
importe         numeric(8,2) not null
);

insert into movimientos (cuenta_id, concepto, importe)
    values (1, 'ingreso', 100);
