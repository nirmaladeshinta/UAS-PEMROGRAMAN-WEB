<html>


<body>
    <?= form_open('Welcome/Save_session'); ?>
    <table>
        <tr>
            <td>User Name</td>
            <td>
                <input type="text" name="user_name" required>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="pswd" required>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" Value="Simpan">
            </td>
        </tr>
    </table>
    </form>
</body>

</html>