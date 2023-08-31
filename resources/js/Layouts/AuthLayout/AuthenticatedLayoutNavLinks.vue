<script setup>

import NavLink from "@/Components/NavLink.vue"

</script>

<template>
    <NavLink :href="route('dashboard')"
             :active="route().current('dashboard')">
        Dashboard
    </NavLink>
    <NavLink :href="route('companies.index')"
             :active="route().current('companies.index')">
        Companies
    </NavLink>
    <NavLink :href="route('employees.index')"
             :active="route().current('employees.index')">
        Employees
    </NavLink>
</template>
