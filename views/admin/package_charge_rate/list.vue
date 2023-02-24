
<template>
    <table-render :path_param="['isp', 'package_charge_rate']" title="Isp Package Charge Rate" :table_fields="table_fields">

        <template #header>
            <th-render>Package Charge</th-render>
            <th-render>Rate</th-render>
            <th-render>Published</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.package_charge_id }}</td>
            <td>{{ item.rate_id }}</td>
            <td class="text-center">
                <btn-status :status="item.published"></btn-status>
            </td>
        </template>

    </table-render>
</template>

<script>

export default {
    data() {
        return {
            table_fields: ['package_charge_id', 'rate_id', 'published'],
        };
    }
};
</script>
