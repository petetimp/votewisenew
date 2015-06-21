
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("bkgr/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("bkgr/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Bkgrid</th>
            <th>Desc</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for bkgr in page.items %}
        <tr>
            <td>{{ bkgr.getBkgrid() }}</td>
            <td>{{ bkgr.getDesc() }}</td>
            <td>{{ bkgr.getCrdt() }}</td>
            <td>{{ bkgr.getCrdtid() }}</td>
            <td>{{ bkgr.getUpdt() }}</td>
            <td>{{ bkgr.getUpdtid() }}</td>
            <td>{{ bkgr.getDelmark() }}</td>
            <td>{{ link_to("bkgr/edit/"~bkgr.getBkgrid(), "Edit") }}</td>
            <td>{{ link_to("bkgr/delete/"~bkgr.getBkgrid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("bkgr/search", "First") }}</td>
                        <td>{{ link_to("bkgr/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("bkgr/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("bkgr/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
