<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('dashboard.section', function ($trail, $section) {
    $trail->parent('dashboard');
    $trail->push($section->name, route('dashboard.section.index',[$section->id]));
});
// dashboard/section/class
Breadcrumbs::for('dashboard.section.class', function ($trail, $sectionClass) {
    $trail->parent('dashboard.section',$sectionClass->section);
    $trail->push($sectionClass->name, route('dashboard.section.class.index',[$sectionClass->id]));
});

// dashboard/section/class/subject
Breadcrumbs::for('dashboard.section.class.subject', function ($trail, $sectionClass) {
    $trail->parent('dashboard.section.class',$sectionClass);
    $trail->push('Subjects', route('dashboard.section.class.subject.index',[$sectionClass->id]));
});

// dashboard/section/class/subject/create-allocation
Breadcrumbs::for('dashboard.section.class.subject.allocation.create', function ($trail, $sectionClassSubject) {
    $trail->parent('dashboard.section.class',$sectionClassSubject->sectionClass);
    $trail->push('create-allocation', route('dashboard.section.class.subject.allocation/create',[$sectionClassSubject->id]));
});

// dashboard/section/class/subject/allocation
Breadcrumbs::for('dashboard.section.class.subject.allocation.reCreate', function ($trail, $sectionClassSubject) {
    $trail->parent('dashboard.section.class',$sectionClassSubject->sectionClass);
    $trail->push('re-allocation', route('dashboard.section.class.subject.allocation.reCreate',[$sectionClassSubject->id]));
});

Breadcrumbs::for('dashboard.section.class-teacher.create', function ($trail, $sectionClass) {
    $trail->parent('dashboard.section',$sectionClass->section);
    $trail->push('create-class-teacher', route('dashboard.section.class-teacher.create',[$sectionClass->id]));
});

Breadcrumbs::for('dashboard.section.class-teacher.reCreate', function ($trail, $sectionClass) {
    $trail->parent('dashboard.section',$sectionClass->section);
    $trail->push('change-class-teacher', route('dashboard.section.class-teacher.reCreate',[$sectionClass->id]));
});


Breadcrumbs::for('dashboard.teacher', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Teachers', route('dashboard.teacher.index'));
});

Breadcrumbs::for('dashboard.teacher.create', function ($trail) {
    $trail->parent('dashboard.teacher');
    $trail->push('Create', route('dashboard.teacher.create'));
});

Breadcrumbs::for('dashboard.student', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Students', route('dashboard.student.index'));
});

Breadcrumbs::for('dashboard.student.create', function ($trail) {
    $trail->parent('dashboard.student');
    $trail->push('Create', route('dashboard.student.create'));
});