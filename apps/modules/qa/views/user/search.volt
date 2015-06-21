
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("user/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("user/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Userid</th>
            <th>Uname</th>
            <th>Pwd</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Bname</th>
            <th>Fname</th>
            <th>Lname</th>
            <th>Utype</th>
            <th>Ulevel</th>
            <th>Active</th>
            <th>Crdt</th>
            <th>Crdtid</th>
            <th>Updt</th>
            <th>Updtid</th>
            <th>Delmark</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for user in page.items %}
        <tr>
            <td>{{ user.getUserid() }}</td>
            <td>{{ user.getUname() }}</td>
            <td>{{ user.getPwd() }}</td>
            <td>{{ user.getEmail() }}</td>
            <td>{{ user.getPhone() }}</td>
            <td>{{ user.getBname() }}</td>
            <td>{{ user.getFname() }}</td>
            <td>{{ user.getLname() }}</td>
            <td>{{ user.getUtype() }}</td>
            <td>{{ user.getUlevel() }}</td>
            <td>{{ user.getActive() }}</td>
            <td>{{ user.getCrdt() }}</td>
            <td>{{ user.getCrdtid() }}</td>
            <td>{{ user.getUpdt() }}</td>
            <td>{{ user.getUpdtid() }}</td>
            <td>{{ user.getDelmark() }}</td>
            <td>{{ link_to("user/edit/"~user.getUserid(), "Edit") }}</td>
            <td>{{ link_to("user/delete/"~user.getUserid(), "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("user/search", "First") }}</td>
                        <td>{{ link_to("user/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("user/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("user/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tbody>
</table>
