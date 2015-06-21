
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("topc/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("topc/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Topcid</th>
            <th>Desc</th>
            <th>Stop</th>
            <th>Order</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for topc in page.items %}
        <tr>
            <td>{{ topc.getTopcid() }}</td>
            <td>{{ topc.getDesc() }}</td>
            <td>{{ topc.getStop() }}</td>
            <td>{{ topc.getOrder() }}</td>
            <td>{{ topc.getCrdt() }}</td>
            <td>{{ topc.getCrdtid() }}</td>
            <td>{{ topc.getUpdt() }}</td>
            <td>{{ topc.getUpdtid() }}</td>
            <td>{{ topc.getDelmark() }}</td>
            <td>{{ link_to("topc/edit/"~topc.getTopcid(), "Edit") }}</td>
            <td>{{ link_to("topc/delete/"~topc.getTopcid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("topc/search", "First") }}</td>
                        <td>{{ link_to("topc/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("topc/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("topc/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
