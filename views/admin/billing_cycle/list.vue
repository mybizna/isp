<template>
    <table-render :path_param="['isp', 'billing_cycle']" title="Isp Billing Cycle" :table_fields="table_fields">

        <template #header>
            <th-render>Title</th-render>
            <th-render>Description</th-render>
            <th-render>Duration</th-render>
            <th-render>Duration Type</th-render>
            <th-render>Published</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.title }}</td>
            <td>{{ item.description }}</td>
            <td>{{ item.duration }}</td>
            <td>{{ item.duration_type }}</td>
            <td>{{ item.published }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['title', 'description', 'duration', 'duration_type', 'published'],
        };
    },
};
</script>
