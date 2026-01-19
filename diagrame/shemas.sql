-- competence 
-- users 
-- brief 
-- sprint
-- annee scolaire 
-- promo 
-- class 



create table users {
   id int serial primary key not null,
   nom varchar (100) not null,
   prenom varchar (100)not null,
   age int not null CHECK (age >= 16 AND age <=100 ),
   email varchar (150)unique not null,
   passwd varchar(255)not null,
   roles varchar (50) not null CHECK (roles IN ('student','teacher','admin'))
}

create table classe {
    id int serial primary key not null,
    nom varchar (100) DEFAULT,
    decription text,
    promotions varchar (50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
}

create table students_class {
    student_id int REFERENCES users(id) ON DELETE CASCADE,
    class_id int REFERENCES classe(id) ON DELETE CASCADE
}

create table teacher_class {
    teacher_id int REFERENCES users(id) ON DELETE CASCADE,
    class_id int REFERENCES class(id) ON DELETE CASCADE
    primary key (teacher_id,class_id)
}
create type niveau_comp as ENUM {
    'IMITER',
    'SADAPTER',
    'TRANSPOSER'
}
create table competence {
    id int serial primary key not null,
    code varchar (50) unique not null,
    label varchar (255) not null, 
    niveau varchar (50) not null check (niveau in ("imiter","sadapter","transposer"))
}

create table sprint {
    id int serial primary key not null,
    nom varchar (100) not null,
    date_debut date,
    date_fin date,
    created_at TIMESTAMP default CURRENT_TIMESTAMP
}

create table brief {
    id int serial primary key not null,
    title varchar (255),
    descr text,
    date_debut timestamp,
    date_fin timestamp,
    types varchar (30) not null CHECK (types in ('individuel','collective')),
    comp_id int REFERENCES competence(id) on DELETE cascade,
    sprint_id int REFERENCES sprint(id) on delete cascade,
    teach_id int references users(id) on delete cascade
}

create table brief_comp {
    id int serial primary key not null,
    comp_id int references competence(id) on DELETE CASCADE,
    brief_id int references brief(id) on DELETE CASCADE
}

create table debriefing (
    id SERIAL PRIMARY KEY,
    brief_id INTEGER NOT NULL REFERENCES brief(id) ON DELETE CASCADE,
    student_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    teach_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    comment TEXT,
    debriefing_date DATE DEFAULT CURRENT_DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(brief_id, student_id)
);

create table eval_comp {
    id serial primary kay not null,
    dber_id int references debriefing(id),
    comp_id int references competence(id),
    statue varchar (100) not null CHECK (statue in ('valider','echoue'))
}

 
