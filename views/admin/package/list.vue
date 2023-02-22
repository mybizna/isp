
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
                {{ item.speed }} {{ (item.speed_type == 'gigabyte') ? 'GBps' : ((item.speed_type == 'megabyte') ? 'MBps' :
                    'KBps') }}
            </td>
            <td>
                {{ item.bundle }} {{ (item.bundle_type == 'gigabyte') ? 'GBps' : ((item.bundle_type == 'megabyte') ? 'MBps'
                    : 'KBps') }}
            </td>
            <td>{{ item.amount }}</td>
            <td>
                {{ item.is_hidden }}
                <i v-if="item.is_hidden" class="fa fa-check-circle text-xl text-red-600"></i>
                <i v-else class="fa fa-times-circle text-xl text-green-600"></i>
            </td>
            <td>
                {{ item.featured }}
                <i v-if="item.featured" class="fa fa-check-circle text-xl text-red-600"></i>
                <i v-else class="fa fa-times-circle text-xl text-green-600"></i>
            </td>
            <td>
                {{ item.published }}
                <i v-if="item.published" class="fa fa-check-circle text-xl text-red-600"></i>
                <i v-else class="fa fa-times-circle text-xl text-green-600"></i>
            </td>
        </template>

    </table-list>
</template>

<script>

export default {
    components: {
        TableList: window.$func.fetchComponent("components/common/TableList.vue"),
        ThRender: window.$func.fetchComponent("components/widgets/ThRender.vue"),
    },
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
