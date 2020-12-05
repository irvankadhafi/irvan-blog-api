<template>
    <div class="card card-statistic-1">
        <div :class="`card-icon bg-${theme}`">
            <i :class="`fas fa-${icon}`"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4>{{ title }}</h4>
            </div>
            <div class="card-body">
                {{ value.toLocaleString() }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "GeneralCard",
    props: {
        title: {
            type: String,
            required: true,
        },
        value: {
            type: Number,
            required: true,
        },
        icon: {
            type: String,
            required: true,
        },
        theme: {
            type: String,
            required: true,
        },
    },
};
</script>
