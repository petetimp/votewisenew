
{{ form("alog/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("alog", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create alog</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="alogid">Alogid</label>
        </td>
        <td align="left">
                {{ text_field("alogid") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="tname">Tname</label>
        </td>
        <td align="left">
            {{ text_field("tname", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="aed">Aed</label>
        </td>
        <td align="left">
            {{ text_field("aed", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="changes">Changes</label>
        </td>
        <td align="left">
            {{ text_field("changes", "size" : 30) }}
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
