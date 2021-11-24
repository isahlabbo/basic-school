<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('dashboard.section', function ($trail, $section) {
    $trail->parent('dashboard');
    $trail->push($section->name, route('dashboard.section.index',[$section->id]));
});

Breadcrumbs::for('dashboard.section.class-teacher.create', function ($trail, $sectionClass) {
    $trail->parent('dasboard.section',$sectionClass->section);
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