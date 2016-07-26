create table urls (
    id serial primary key,
    url text not null,
    vote integer not null,
    last_revision timestamp without time zone not null default now()
);
