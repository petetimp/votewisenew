
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("rank/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("rank/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Rankid</th>
            <th>Userid</th>
            <th>Quesid</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for rank in page.items %}
        <tr>
            <td>{{ rank.getRankid() }}</td>
            <td>{{ rank.getUserid() }}</td>
            <td>{{ rank.getQuesid() }}</td>
            <td>{{ rank.getCrdt() }}</td>
            <td>{{ rank.getCrdtid() }}</td>
            <td>{{ rank.getUpdt() }}</td>
            <td>{{ rank.getUpdtid() }}</td>
            <td>{{ rank.getDelmark() }}</td>
            <td>{{ link_to("rank/edit/"~rank.getRankid(), "Edit") }}</td>
            <td>{{ link_to("rank/delete/"~rank.getRankid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("rank/search", "First") }}</td>
                        <td>{{ link_to("rank/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("rank/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("rank/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
