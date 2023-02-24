
<template>
    <table-render :path_param="['isp', 'package_setup_item']" title="Isp Package Setup Item" :table_fields="table_fields">

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
            <td>{{ item.package_id }}</td>
            <td>{{ item.ledger_id }}</td>
            <td>{{ item.quantity }}</td>
            <td>{{ item.price }}</td>
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
            table_fields: ['title', 'package_id', 'ledger_id', 'quantity', 'price', 'published'],
        };
    }
};
</script>
