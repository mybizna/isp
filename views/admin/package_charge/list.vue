
<template>
    <table-render :path_param="['isp', 'package_charge']" title="Isp Package Charge" :table_fields="table_fields">

        <template #header>
            <th-render>Title</th-render>
            <th-render>Package</th-render>
            <th-render>Ledger</th-render>
            <th-render>Quantity</th-render>
            <th-render>Price</th-render>
            <th-render>Published</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.title }}</td>
            <td>{{ item.package_title }}</td>
            <td>{{ item.ledger_name }}</td>
            <td class="text-center">{{ item.quantity }}</td>
            <td class="text-right">{{ item.price }}</td>
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
            table_fields: [
                
            'title', 'quantity', 'price', 'published',
            'package_id__isp_package__title as package_title', 'ledger_id__account_ledger__name as ledger_name',
        ],
        };
    }
};
</script>
