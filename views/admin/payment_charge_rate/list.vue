<template>
    <table-render :path_param="['isp', 'payment_charge_rate']" title="Isp Payment Charge Rate" :table_fields="table_fields">

        <template #header>
            <th-render>Payment Charge</th-render>
            <th-render>Rate</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.payment_charge_id }}</td>
            <td>{{ item.rate_id }}</td>
        </template>

    </table-render>
</template>

<script>
export default {
    data() {
        return {
            table_fields: ['payment_charge_id', 'rate_id'],
        };
    },
};
</script>
