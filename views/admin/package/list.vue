
<template>
    <table-render :path_param="['isp', 'package']" title="Isp Package" :table_fields="table_fields">

        <template #header>
            <th-render>Title</th-render>
            <th-render>Slug</th-render>
            <th>Billing Cycle</th>
            <th-render>Speed</th-render>
            <th-render>Bundle</th-render>
            <th-render>Amount</th-render>
            <th-render>Hidden in Portal</th-render>
            <th-render>Featured</th-render>
            <th-render>Published</th-render>
        </template>

        <template #body="{ item }">
            <td>{{ item.title }}</td>
            <td>{{ item.slug }}</td>
            <td>{{ item.billing_cycle_id }}</td>
            <td>
                <template v-if="item.bundle">
                    {{ item.speed }} {{ (item.speed_type == 'gigabyte') ? 'GBps' : ((item.speed_type == 'megabyte') ? 'MBps'
                        :
                        'KBps') }}
                </template>
            </td>
            <td>
                <template v-if="item.bundle">
                    {{ item.bundle }} {{ (item.bundle_type == 'gigabyte') ? 'GB' : ((item.bundle_type == 'megabyte') ? 'MB'
                        : 'KB') }}
                </template>
            </td>
            <td>{{ item.amount }}</td>
            <td class="text-center">
                <btn-status :status="item.is_hidden"></btn-status>
            </td>
            <td class="text-center">
                <btn-status :status="item.featured"></btn-status>
            </td>
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
                'title', 'slug', 'billing_cycle_id', 'speed', 'speed_type', 'bundle', 'bundle_type',
                'amount', 'is_hidden', 'featured', 'published'
            ]
        };
    }
};
</script>
