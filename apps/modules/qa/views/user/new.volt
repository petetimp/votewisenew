
{{ form("user/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("user", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create user</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="userid">Userid</label>
        </td>
        <td align="left">
                {{ text_field("userid") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="uname">Uname</label>
        </td>
        <td align="left">
            {{ text_field("uname", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="pwd">Pwd</label>
        </td>
        <td align="left">
            {{ text_field("pwd", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="email">Email</label>
        </td>
        <td align="left">
            {{ text_field("email", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="phone">Phone</label>
        </td>
        <td align="left">
            {{ text_field("phone", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="bname">Bname</label>
        </td>
        <td align="left">
            {{ text_field("bname", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fname">Fname</label>
        </td>
        <td align="left">
            {{ text_field("fname", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="lname">Lname</label>
        </td>
        <td align="left">
            {{ text_field("lname", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="utype">Utype</label>
        </td>
        <td align="left">
                {{ text_field("utype") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ulevel">Ulevel</label>
        </td>
        <td align="left">
                {{ text_field("ulevel") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="active">Active</label>
        </td>
        <td align="left">
            {{ text_field("active", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="crdt">Crdt</label>
        </td>
        <td align="left">
            {{ text_field("crdt", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="crdtid">Crdtid</label>
        </td>
        <td align="left">
                {{ text_field("crdtid") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="updt">Updt</label>
        </td>
        <td align="left">
            {{ text_field("updt", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="updtid">Updtid</label>
        </td>
        <td align="left">
                {{ text_field("updtid") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="delmark">Delmark</label>
        </td>
        <td align="left">
            {{ text_field("delmark", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
