
<template>
    <table-render :path_param="['isp', 'gateway']" title="Isp Gateway" :table_fields="table_fields">

        <template #header>
            <th-render>Title</th-render>
            <th-render>Username</th-render>
            <th-render>Password</th-render>
            <th-render>Database</th-render>
            <th-render>IP Address</th-render>
            <th-render>Port</th-render>
            <th-render>Type</th-render>
            <th-render>Published</th-render>
        </template>
        <template #body="{ item }">
            <td>{{ item.title }}</td>
            <td>{{ item.username }}</td>
            <td>{{ item.password }}</td>
            <td>{{ item.database }}</td>
            <td>{{ item.ip_address }}</td>
            <td>{{ item.port }}</td>
            <td>{{ item.type }}</td>
            <td class="text-center">
                <btn-status :status="item.is_fetched"></btn-status>
            </td>
        </template>

    </table-render>
</template>


<script>

export default {
    data() {
        return {
            table_fields: ['title', 'username', 'password', 'database', 'ip_address', 'port', 'type', 'published'],

        };
    }
};
</script>
