
<template>
    <table-list :path_param="['isp', 'package']" title="Isp Package" :search_fields="search_fields" :model="model"
        :table_fields="table_fields">

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

    </table-list>
</template>

<script>

export default {
    data() {
        return {
            model: {
                id: "",
                title: "",
                slug: "",
                description: "",
                billing_cycle_id: "",
                speed: "",
                speed_type: "",
                published: "",
                is_hidden: "",
                published: "",
                amount: "",
            },
            search_fields: [
                { type: "text", name: "title", label: "Title", ope: "", },
                { type: "text", name: "billing_cycle_id", label: "Billing Cycle", ope: "", },
                { type: "text", name: "speed", label: "Speed", ope: "", },
                { type: "select", name: "speed_type", label: "Speed Type", ope: "", option: ['kilobyte', 'megabyte'] },
                { type: "switch", name: "is_hidden", label: "Hidden", ope: "", },
                { type: "switch", name: "featured", label: "Featured", ope: "", },
                { type: "switch", name: "published", label: "Published", ope: "", },
            ],
            table_fields: [
                { text: "Title", prop: "title", name: "title", },
                { text: "Slug", prop: "slug", name: "slug", },
                { text: "Billing Cycle", prop: "billing_cycle_id", name: "billing_cycle_id", },
                { text: "Speed", prop: "speed", name: "speed", },
                { text: "Speed Type", prop: "speed_type", name: "speed_type", },
                { text: "Bundle", prop: "bundle", name: "bundle", },
                { text: "Bundle Type", prop: "bundle_type", name: "bundle_type", },
                { text: "Amount", prop: "amount", name: "amount", },
                { text: "Hidden in Portal", prop: "is_hidden", align: "center", is_boolean: true, name: "is_hidden", },
                { text: "Featured", prop: "featured", align: "center", is_boolean: true, name: "featured", },
                { text: "Published", prop: "published", align: "center", is_boolean: true, name: "published", },
            ],

            /*
            table_fields: [
                'title', 'slug', 'billing_cycle_id', 'speed', 'speed_type', 'bundle', 'bundle_type',
                'amount', 'is_hidden', 'featured', 'published'

            ]
            */
        };
    }
};
</script>
