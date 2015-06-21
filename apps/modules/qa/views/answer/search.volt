
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("answ/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("answ/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Answid</th>
            <th>Quesid</th>
            <th>Userid</th>
            <th>Agree</th>
            <th>Rank</th>
            <th>Comment</th>
            <th>Inans</th>
            <th>Rankid</th>
            <th>Chgreason</th>
            <th>Chgcomment</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for answ in page.items %}
        <tr>
            <td>{{ answ.getAnswid() }}</td>
            <td>{{ answ.getQuesid() }}</td>
            <td>{{ answ.getUserid() }}</td>
            <td>{{ answ.getAgree() }}</td>
            <td>{{ answ.getRank() }}</td>
            <td>{{ answ.getComment() }}</td>
            <td>{{ answ.getInans() }}</td>
            <td>{{ answ.getRankid() }}</td>
            <td>{{ answ.getChgreason() }}</td>
            <td>{{ answ.getChgcomment() }}</td>
            <td>{{ answ.getCrdt() }}</td>
            <td>{{ answ.getCrdtid() }}</td>
            <td>{{ answ.getUpdt() }}</td>
            <td>{{ answ.getUpdtid() }}</td>
            <td>{{ answ.getDelmark() }}</td>
            <td>{{ link_to("answ/edit/"~answ.getAnswid(), "Edit") }}</td>
            <td>{{ link_to("answ/delete/"~answ.getAnswid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("answ/search", "First") }}</td>
                        <td>{{ link_to("answ/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("answ/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("answ/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
