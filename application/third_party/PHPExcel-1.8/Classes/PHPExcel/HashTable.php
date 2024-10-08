<?php

/**
 * PHPExcel_HashTable
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
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel_HashTable
{
    /**
     * HashTable elements
     *
     * @var array
     */
    protected $items = array();

    /**
     * HashTable key map
     *
     * @var array
     */
    protected $keyMap = array();

    /**
     * Create a new PHPExcel_HashTable
     *
     * @param    PHPExcel_IComparable[] $pSource    Optional source array to create HashTable from
     * @throws    PHPExcel_Exception
     */
    public function __construct($pSource = null)
    {
        if ($pSource !== null) {
            // Create HashTable
            $this->addFromSource($pSource);
        }
    }

    /**
     * Add HashTable items from source
     *
     * @param    PHPExcel_IComparable[] $pSource    Source array to create HashTable from
     * @throws    PHPExcel_Exception
     */
    public function addFromSource($pSource = null)
    {
        // Check if an array was passed
        if ($pSource == null) {
            return;
        } elseif (!is_array($pSource)) {
            throw new PHPExcel_Exception('Invalid array parameter passed.');
        }

        foreach ($pSource as $item) {
            $this->add($item);
        }
    }

    /**
     * Add HashTable item
     *
     * @param    PHPExcel_IComparable $pSource    Item to add
     * @throws    PHPExcel_Exception
     */
    public function add(PHPExcel_IComparable $pSource = null)
    {
        $hash = $pSource->getHashCode();
        if (!isset($this->items[$hash])) {
            $this->items[$hash] = $pSource;
            $this->keyMap[count($this->items) - 1] = $hash;
        }
    }

    /**
     * Remove HashTable item
     *
     * @param    PHPExcel_IComparable $pSource    Item to remove
     * @throws    PHPExcel_Exception
     */
    public function remove(PHPExcel_IComparable $pSource = null)
    {
        $hash = $pSource->getHashCode();
        if (isset($this->items[$hash])) {
            unset($this->items[$hash]);

            $deleteKey = -1;
            foreach ($this->keyMap as $key => $value) {
                if ($deleteKey >= 0) {
                    $this->keyMap[$key - 1] = $value;
                }

                if ($value == $hash) {
                    $deleteKey = $key;
                }
            }
            unset($this->keyMap[count($this->keyMap) - 1]);
        }
    }

    /**
     * Clear HashTable
     *
     */
    public function clear()
    {
        $this->items = array();
        $this->keyMap = array();
    }

    /**
     * Count
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Get index for hash code
     *
     * @param    string    $pHashCode
     * @return    int    Index
     */
    public function getIndexForHashCode($pHashCode = '')
    {
        return array_search($pHashCode, $this->keyMap);
    }

    /**
     * Get by index
     *
     * @param    int    $pIndex
     * @return    PHPExcel_IComparable
     *
     */
    public function getByIndex($pIndex = 0)
    {
       �	�gy�J�����2�5[Z;5��c�ɡ�a�MSR�7?�"���j�v��(���.�<�SHʎs��u� �=� �^��3b
}�pps��y��4�h�0v�0z� �����ˈ(9�����ھ+�`r��UeQ?�������Y�K4�Z��*4"��N)�_ʺv�-��G���8��?��)�#ʌ�Ӧ:�?�Iw.��1�\{pz{�q.�یg>��'���_AN�YN�$)��q�-���" ���Wz���4-��b<��1������Mk��Al����8���j����~o�?Ls� ��Ҿl`����ֺ�8,L}訶���Q��萪���u鮽/�RfY�ꎽQ�;�����\G"�|p:�����jAf;�=��O�Ͽ?�S\��O���/�ƕX˚m����ו��S�eVJ2�R�D���țNX�At��#��r;�ާ�巊�Q�q���x����v�"f ��q؏j�E�6B�t�>�W�᱕�F0�*SR�\�Riy6��g��(J-�[�<�ŗб�(Q����� ����5�����RT�'�����שx�m�0$cs�П�ɯ*֜"�3�y�x�}�ƵR�䖏�J+�Aa�=^��Z��<Ԯ �*ʹ<u���l�"L�v��s�n���ݏ4��Sѿ�/_��ו��t�Ӝ�O��� Z�*8\>�i-$����|)E��?����m� �~c�����״�Ih2 ��'����ץJ��[����Veʆ�^�=�=붭*q�����t�m',�Z�吝�E]�x�rz����B{F$��׷�� �&�9�l����.t rq�?Q���Ҽ��΢SVJ���4�̵}��� >�=��z�?�ϭs��-��)8���Ӯ�w��x8�`_&��pz��ݺ��B4�Ӄ���[_�|���񂨜[k޵֎޷G�����w ���