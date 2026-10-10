<?php

return [
    // =====================================================
    // BELLEZA
    // =====================================================

    [
        'id' => 1,
        'name' => 'Belleza',
        'parent_id' => null,
        'active' => true,
    ],

    [
        'id' => 2,
        'name' => 'Maquillaje',
        'parent_id' => 1,
        'active' => true,
    ],

    [
        'id' => 3,
        'name' => 'Perfumes',
        'parent_id' => 1,
        'active' => true,
    ],

    [
        'id' => 4,
        'name' => 'Cuidado de piel',
        'parent_id' => 1,
        'active' => true,
    ],

    // =====================================================
    // CUIDADO PERSONAL
    // =====================================================

    [
        'id' => 5,
        'name' => 'Cuidado personal',
        'parent_id' => null,
        'active' => true,
    ],

    [
        'id' => 6,
        'name' => 'Cuidado oral',
        'parent_id' => 5,
        'active' => true,
    ],

    [
        'id' => 7,
        'name' => 'Higiene personal',
        'parent_id' => 5,
        'active' => true,
    ],

    [
        'id' => 8,
        'name' => 'Cuidado capilar',
        'parent_id' => 5,
        'active' => true,
    ],

    // =====================================================
    // SALUD Y FARMACIA
    // =====================================================

    [
        'id' => 9,
        'name' => 'Salud y farmacia',
        'parent_id' => null,
        'active' => true,
    ],

    [
        'id' => 10,
        'name' => 'Farmacia',
        'parent_id' => 9,
        'active' => true,
    ],

    [
        'id' => 11,
        'name' => 'Nutrición y deportes',
        'parent_id' => 9,
        'active' => true,
    ],

    // =====================================================
    // MEDICAMENTOS
    // =====================================================

    [
        'id' => 12,
        'name' => 'Medicamentos',
        'parent_id' => null,
        'active' => true,
    ],
];