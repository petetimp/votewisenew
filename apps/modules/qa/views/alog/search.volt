
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("alog/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("alog/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Alogid</th>
            <th>Tname</th>
            <th>Aed</th>
            <th>Changes</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for alog in page.items %}
        <tr>
            <td>{{ alog.getAlogid() }}</td>
            <td>{{ alog.getTname() }}</td>
            <td>{{ alog.getAed() }}</td>
            <td>{{ alog.getChanges() }}</td>
            <td>{{ alog.getCrdt() }}</td>
            <td>{{ alog.getCrdtid() }}</td>
            <td>{{ alog.getUpdt() }}</td>
            <td>{{ alog.getUpdtid() }}</td>
            <td>{{ alog.getDelmark() }}</td>
            <td>{{ link_to("alog/edit/"~alog.getAlogid(), "Edit") }}</td>
            <td>{{ link_to("alog/delete/"~alog.getAlogid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("alog/search", "First") }}</td>
                        <td>{{ link_to("alog/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("alog/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("alog/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
