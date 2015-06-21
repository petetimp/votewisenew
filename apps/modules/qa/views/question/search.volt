
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("ques/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("ques/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Quesid</th>
            <th>Desc</th>
            <th>Order</th>
            <th>Bkgrid</th>
            <th>Qtype</th>
            <th>Amttext</th>
            <th>Amttype</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for que in page.items %}
        <tr>
            <td>{{ que.getQuesid() }}</td>
            <td>{{ que.getDesc() }}</td>
            <td>{{ que.getOrder() }}</td>
            <td>{{ que.getBkgrid() }}</td>
            <td>{{ que.getQtype() }}</td>
            <td>{{ que.getAmttext() }}</td>
            <td>{{ que.getAmttype() }}</td>
            <td>{{ que.getCrdt() }}</td>
            <td>{{ que.getCrdtid() }}</td>
            <td>{{ que.getUpdt() }}</td>
            <td>{{ que.getUpdtid() }}</td>
            <td>{{ que.getDelmark() }}</td>
            <td>{{ link_to("ques/edit/"~que.getQuesid(), "Edit") }}</td>
            <td>{{ link_to("ques/delete/"~que.getQuesid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("ques/search", "First") }}</td>
                        <td>{{ link_to("ques/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("ques/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("ques/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
