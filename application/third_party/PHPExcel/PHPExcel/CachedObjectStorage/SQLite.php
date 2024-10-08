<?php

/**
 * PHPExcel_CachedObjectStorage_SQLite
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_CachedObjectStorage
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel_CachedObjectStorage_SQLite extends PHPExcel_CachedObjectStorage_CacheBase implements PHPExcel_CachedObjectStorage_ICache
{
    /**
     * Database table name
     *
     * @var string
     */
    private $TableName = null;

    /**
     * Database handle
     *
     * @var resource
     */
    private $DBHandle = null;

    /**
     * Store cell data in cache for the current cell object if it's "dirty",
     *     and the 'nullify' the current cell object
     *
     * @return    void
     * @throws    PHPExcel_Exception
     */
    protected function storeData()
    {
        if ($this->currentCellIsDirty && !empty($this->currentObjectID)) {
            $this->currentObject->detach();

            if (!$this->DBHandle->queryExec("INSERT OR REPLACE INTO kvp_".$this->TableName." VALUES('".$this->currentObjectID."','".sqlite_escape_string(serialize($this->currentObject))."')")) {
                throw new PHPExcel_Exception(sqlite_error_string($this->DBHandle->lastError()));
            }
            $this->currentCellIsDirty = false;
        }
        $this->currentObjectID = $this->currentObject = null;
    }

    /**
     * Add or Update a cell in cache identified by coordinate address
     *
     * @param    string            $pCoord        Coordinate address of the cell to update
     * @param    PHPExcel_Cell    $cell        Cell to update
     * @return    PHPExcel_Cell
     * @throws    PHPExcel_Exception
     */
    public function addCacheData($pCoord, PHPExcel_Cell $cell)
    {
        if (($pCoord !== $this->currentObjectID) && ($this->currentObjectID !== null)) {
            $this->storeData();
        }

        $this->currentObjectID = $pCoord;
        $this->currentObject = $cell;
        $this->currentCellIsDirty = true;

        return $cell;
    }

    /**
     * Get cell at a specific coordinate
     *
     * @param     string             $pCoord        Coordinate of the cell
     * @throws     PHPExcel_Exception
     * @return     PHPExcel_Cell     Cell that was found, or null if not found
     */
    public function getCacheData($pCoord)
    {
        if ($pCoord === $this->currentObjectID) {
            return $this->currentObject;
        }
        $this->storeData();

        $query = "SELECT value FROM kvp_".$this->TableName." WHERE id='".$pCoord."'";
        $cellResultSet = $this->DBHandle->query($query, SQLITE_ASSOC);
        if ($cellResultSet === false) {
            throw new PHPExcel_Exception(sqlite_error_string($this->DBHandle->lastError()));
        } elseif ($cellResultSet->numRows() == 0) {
            //    Return null if requested entry doesn't exist in cache
            return null;
        }

        //    Set current entry to the requested entry
        $this->currentObjectID = $pCoord;

        $cellResult = $cellResultSet->fetchSingle();
        $this->currentObject = unserialize($cellResult);
        //    Re-attach this as the cell's parent
        $this->currentObject->attaj�����f@qƼ�>�l���q?��I�����x?�T�+�iM?ޔ'�:Х������V�_[�M�g4��/Dd@�ŏ��x6���������P<Ҁ&|E�
@�����0?3BD�����P8s5�A�z�͋�H^��	��:�o��<@�/�[?.h�n�)�����1#/��߈�E؇dP?&�,�t�A!j�y�U���08܏I��ܳ�4���r?^=���~<���Ӵd��*���΋���JxJ�%�S����ɹ��:yv�_+���g�c���&��^^|m�/��<��>["�DiI�xZJc��hǩ�f��۸'9'/~�y��5�R�'#u�o�1�	Tť8���]�O�n4�<� ���$A^|�����#m4�q���lH��S�_5|H��l�\���B4J	�Z���@~�
7��,���p8آ�7*��Dc���#�/�����i촟�N�����5z	����{�.���{,<�t�|M��R5��� xr����"�h�u+�E2��:.���N3�/:��/�6����W����NņT}�^�/$�)Zc���;�G��f�fO]7f�w)67�����9�Ŷ��[=��d3P VP8 �2  �� �*� � >m*�E�"!��`@Ķ�l�|��{Ͽ���iEPV�xb ��W������ �?�~ z����Z/���K��Y�/��׿�}�t�^d���w�W��O���}��g�M�o��������~�?js�������������W�_���^ǿ�?�{L�{��׫��C����ݏi��>��=@?���r�Q�o��~����������K�/��/���Kɇ������c��_C{{Wγ��D�o��>�}������?����[����g����-����������4>�?������՟��|C����ן؟����w��������\�p�yn�U���P��J��\����j������#�E �@i����ݡ�~�G��(b������w	��4�gSҧ_�x,���FB�؜���,B!�p]���=�VT�҂��6����_�SY�*4ӑ'� �#�����Q��?�-��_��A�ewM��������O�]����mAڕ���=L�_��y_�#�MV���yd�G�A�Ǧ��<����,���P���������޶~K١T��q��ms�R�w�r�R�������y���nh�4�����&�����)�в�J��kNWZ:��N��c�2S���mV��V�Ѝ�`g�ѽPq�����  �N�2���v?^�����$���X�;*ol�"�;FU����3�h��8��]�N����I��Bʦ�1�r|��=��%U��蝘l�ț�A-�N�Y�V;1e���ur���7;R�ᾦq�P  �^�Bb�#� T�a�-#�?@l���h�ᯌ�뷁0�*�3�P{T.�����ơ|�p��0���@��ڪ����i��nN���İ>��y�ÿq�dD]�FE�W��YA�_��
� �1Dv����$��4$<¨g������@x���ntʞd�<�����4�ƬO�_?ܚ�'EY����M�rE&$�h�'��#�G�
*v�(�<���hn]#g<Ge�`Xw�ک`EL�/l{�Z�$��{\�X<<����=���w9��N��Ѹ��.���Yhw}	��`����̘��m	
������B�;��?.�j���2�j�a�*�(�~��?-�ø��k�=}�B!�*�-��7)kL�M��ց��D�4�����K���5��4�,fa�b�%v�ۡ�!�n�f��?���:����bF�(  �0���~V��b�Ϫ/mjA���[?��?��uzn#��V�v�v�i|�@�y����^t��=�{�!��t�ݣ{<�q\iA@<	J�5���p���{;Zg�t���l"*�qdw�F:�wހ��*�d��'���!�
�[;��D��|����c[�<#}� *"�Π��(�A�G����&c���9�[��Ec<�7s�� �8�~�K���83�GJ:۽lAC����6�ֆ,�%�a֬���FO����R��K밵Ƙ�S�����[���)��e�^D��j�HE���V�@�B�¢Ńa����b�����2? ��!����~�!� �l������_��9�nHd7�dIt����,!�>
��UXl��u�R����JQ���y�G���� ������ڂ�c�.�[#mhY������ծYĀlG��	��| �y����0��k�,��N��:��=�"�"�h�|�Ѱ���ĸ{E陿&nT�*��2�>$�Q�	��qc�y���a����2�z����ჺ2��L4�u
=v"'6D �4���ƃ����;�-��*	�c��R�ɻ�0���ͱ|;_U����g�C9n����)}�-�OJ(�e���n{�
h���}�+�j7��W�O	�0����Ǧ�"��Hn�,Cl�F%Z�Wu�-L��~N9Kq-�)+v��fbp.ݸ&��w��'�?Gt���z	=۷����3_����8dp!<��1/���5LZ�~������w�.s
�����Z�=���گ�)�;�	2WЍ�d�s�])r}��W�\����~)��h�s�~��"�@�x�;��C��msQ��v��V;jf�:����W��x�TG'*&Xxo��6y<�^'�2ұ�3��~0�0`|BX�l,�~�y�t8w��I "z����]Cr��|��^�N�+i�bH��X��E��(��R���'��4���H�o$e7���ƙ�����R'�o��:�?�W�=C}�l��za�H�*U���V���,����J�f� g��o��h�Kk�5�&AI����O��P����sg6���p*���* ��H۟���#���t�1�P�G��tK�������/3�W����xn�	V+���8�g���ߕY7� I�2������NI�T>BJ�Z��p$�t+���d4����<�4�noxb����t��2���s'��|�ۈ;�\�� z�_%$
�W���xr��i��h���DEߜ��|n�=F%ew.oC�M@�'������W r�}��8�.�Șb-��V���0nҳ}��+��Yn8U~
���=�>HC����	.�B�m�'�)Հ����Y��%��������t�cj��mخ+�+�I�-z�9 �7��ԽN�}Ѝ�i�<βa�����4M���d���7���iv�w\�W1��

�$0L\`B�x�c�ѣ]A��v.����6��m7�)�ؙ�B|pJ���s��o߉ڬ���������y�z�j8���O&%Gr����˯{C]P�E|�G(��l|-!�kF� ��%tA~�z���@������� Q�ZY�W
���|R��H�?�|�y����(TQ�wV�(���Ͻ���G@�B�S3�a�t=~Eq��]�c��H"4�ֱ��[����ݣ"y滩Yq�b��od��������e��<�:�a�%��� ����Q�|r�Oפ4w��1�XpMX�i��&2mf1���8��=��{H���'aP+���1�^��I/K(߃��;|h7���(�>��ц��R�=[G��$�I�j�@倿2h}����P*�����.���qմS#?�޵3��ɴG�l�a��O ��,����b���c�����{�MQ����g��#���IEx+t���i?�/~�la��mIs��$`DG�!�)f�eg�Z׭�r�2��|;�����ly��NEp����F%���A$3���������$��}X�l���tk�OZ�bߢ��id������ I�}ӓs�66�0�p/�&Fۭ�c��~$�Y��l`�~���v���kL�IO�/��Y�v���$�g(�p��0JG�7�"��P-����ȕ���-��X�g�S�zx��x�PeV���`�H�W���k�Q���A���f�x��,����0U2e��3��R(��ן�����6F�y�!���z��gQ�9����i�0�u��O��K@�f�i5z�}�6�2l�BĆLQ�_�q�nvv)��̗kQ]�qH$z��[�q�W`��B+��V"^�<Iɧޏ��vD�+5��m(hA�I�H���rKW��=jE��k�^�0�x�t&������.��P�r�KD�q�Àõf��W=��+|�<�!����]�������dJ��_C���CS���C�-�������C��
s���t�gX�a��d�q+�
tº�fw��j�g��r
�~���`YC�\��ѓC�9}A�y��gs�"'t�@�@߉ޅF��|��@8�4:**P��l��a�<��nTHu�kX�_��(��e�q0a��\'����]W1q�4W�\��&]�HW*����p_�ܪ����3e8Y\�)-N������--���G���B@�n�)�*ںg����Y��� 	Ѷh����m���.� ��EV�nd&���q=l��%"X�aB�]y�ɥEO5b�}��闠Ùղ�;���#���)6 r ?7��MX����,�H�����`�����%�,7��c�-�{vo��u�b3���V}���[���]�a��R���/=��4����7Ͳ�c7$���a[Uwti.g�7�K�b��S���M����yzm��N�$�$����m��#�Xq_v��� oM�T�� /X���������O�"�M�eU���9e��s�md��/®����{Y��LX�c��`�%���[��eD��	̆�*�%�dMj��)�s�#��TYA`�*�9�S![Ma�h�B܅���5V�lH�α�[�.=���U���N�5�)G�9�թ��`�Ǔ>��8���������^
0�-H��-O$�Pϝ~���ֶ`ir�h���Zzׯ�h1���H��t�(ߪ�:��X$H
�|�li�K�:�K�� ��x:C�L�r���$�æz@��q��e�+㯫+������F��p�,6;"�o`%�pK�����; �߈� �~1BF��4E�BE�bS��H;_y���c�ٳ�=���ɺ���/�h�W�%�,|EY��&.������r��鐲�W��ۭ��:f�$��"}��ճ��JA]����n�:PdA��������yZ"~�#β������ *��]�}B�	� �@��[m(s���,/:͏��by�4]��:SY.�!,��MVt_�6�{8ΉQ�����{��.$L���Q�P���f���\`}�#PO��7���iא�b�:��	���š�L� �}�W�e���2��m��ʆz����@��Mİ�0O� ��%�D��J�6%�U=��t��Oa���|X��R�Gh����Y�q��4S���LUg���G��0	�
���};Z�6?����n�c���x�^j�M���F��t"ΙYb�A��0��"�_���N�f�?�L�V�u;��h� � `���?����=�4�h>*O��v��ލ9�}l=��^%1xU��bY�:�?����}��SZ-�/�^�*ۿS�D����N'�v��ۆ�wǞmQ=B��V]_���+ڼH���2g�[�̳��rR�B�Q��eaXNn`<{��l��F�ֲ߈��A�=,Z1K!�2����Z��k���3�g��Q�T��*�d��ԩ���(yP�Z�����Q�0b�H�����iƹ��Z��V@���<5��4�����H������%?�e ?.�a�3>5v�f���dǾYqS� ���H�����E�?rD�6���|�b'��٤y~�Wf�+�i�>d�,߫�)Q��< Y� �W8��L(�A��}b^?�%o��2�n�v�f��8JԬ��@�E��v-5��w��@!{�4[Y�{�4�t��H~₻�?AYҵ�Q}�4m�J����J�UP�5ʗxm1�7���g�KW��r�Y�|�<_�Pr�z���a��»���������`����i���<�#�3z���l�����Re۞�7-�!�i�ӹ�b�zex ����Z��fer���b-�1)�}���;�0�yǋ�
�s��vK���꧗%��?4r�&kh�