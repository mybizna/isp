
<template>
    <table-render :path_param="['isp', 'subscriber']" title="Isp Subscriber" :table_fields="table_fields">

        <template #header>
            <th-render>Username</th-render>
            <th-render>Invoice</th-render>
        </template>
        <template #body="{ item }">
            <td>{{ item.username }}</td>
            <td>{{ item.partner_id__partner__first_name }} {{ item.partner_id__partner__last_name }}</td>
        </template>

    </table-render>
</template>

<script>

export default {
    data() {
        return {
            table_fields: ['username', 'partner_id__partner__first_name', 'partner_id__partner__last_name'],
        };
    }
};
</script>
