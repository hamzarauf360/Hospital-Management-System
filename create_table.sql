 create table speciality(
speciality_name varchar2(30) constraint s_n_p_k PRIMARY KEY);

 create table ward(
ward_name varchar2(15) constraint w_n_p_k PRIMARY KEY,
speciality_name varchar2(30) NOT NULL,
FOREIGN KEY(speciality_name) references speciality(speciality_name));



create table staff_nurse(
staff_nurse_no number constraint s_nurse_p_k PRIMARY KEY,
ward_name varchar2(15) NOT NULL ,
FOREIGN KEY(ward_name) references ward(ward_name));


create table non_reg_nurse(
non_reg_nurse_no number constraint non_reg_nurse_p_k PRIMARY KEY,
ward_name varchar2(15) NOT NULL ,
FOREIGN KEY(ward_name) references ward(ward_name));



create table day_sister(
day_sister_no number constraint day_sister_p_k PRIMARY KEY,
ward_name varchar2(15) NOT NULL UNIQUE,
FOREIGN KEY(ward_name) references ward(ward_name));


create table night_sister(
night_sister_no number constraint night_sister_p_k PRIMARY KEY,
ward_name varchar2(15) NOT NULL UNIQUE,
FOREIGN KEY(ward_name) references ward(ward_name));

create table care_unit(
unit_no number constraint u_p_k PRIMARY KEY,
incharge_staff_nurse number NOT NULL UNIQUE,
ward_name varchar(15) NOT NULL,
FOREIGN KEY(incharge_staff_nurse) references staff_nurse(staff_nurse_no),
FOREIGN KEY(ward_name) references ward(ward_name));

create table doctor(
doc_no number constraint d_p_k PRIMARY KEY,
    DOC_NAME varchar2(20) NOT NULL
);

create table consultant(
    consultant_no number constraint con_p_k PRIMARY KEY,
    doc_no number NOT NULL unique,
    speciality_name varchar2(30) NOT NULL,
    FOREIGN KEY(doc_no) references doctor(doc_no),
    FOREIGN KEY(speciality_name) references speciality(speciality_name));

create table team(
    join_date date,
    position varchar(2),
    consultant_id number NOT NULL,
    doc_no number NOT NULL UNIQUE,
    FOREIGN KEY(consultant_id) references consultant(consultant_no),
   FOREIGN KEY(doc_no) references doctor(doc_no));

    create table patient(
    patient_no number constraint p_p_k PRIMARY KEY,
    patient_Name varchar2(20) NOT NULL,
    d_o_b date NOT NULL,
    date_of_admission date NOT NULL,
    address varchar2(30) NOT NULL,
    bed_no number NOT NULL UNIQUE,
    ward_name varchar(15) NOT NULL,
    incharge_doc number NOT NULL,
    care_unit_no number NOT NULL,
   FOREIGN KEY(ward_name) references ward(ward_name),
   FOREIGN KEY(incharge_doc) references doctor(doc_no),
   FOREIGN KEY(care_unit_no) references care_unit(unit_no));



 create table complaint(
    complaint_no number constraint comp_p_k PRIMARY KEY,
    complaint_name varchar2(20) NOT NULL,
    patient_no number NOT NULL,
    FOREIGN KEY(patient_no) references patient(patient_no));



create table treatment(
    treatment_code number constraint tt_p_k PRIMARY KEY,
    start_date date NOT NULL,
    end_date date NOT NULL,
    doc_no number NOT NULL,
    complaint_no number NOT NULL,
    FOREIGN KEY(doc_no) references doctor(doc_no),
    FOREIGN KEY(complaint_no) references complaint(complaint_no));

   

    create table experience(
    from_date date NOT NULL,
    to_date date NOT NULL,
    establishment varchar2(50),
    position varchar2(2) NOT NULL,
    doc_no number NOT NULL,
    FOREIGN KEY(doc_no) references doctor(doc_no));

    

create table progress(
    date_grade date NOT NULL,
    performance varchar2(1) NOT NULL,
    doc_no number NOT NULL,
    FOREIGN KEY(doc_no) references doctor(doc_no));

    

