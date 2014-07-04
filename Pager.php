<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Commmon;

/**
 * Description of Pager
 *
 * @author Administrator
 */
class Pager {

    //put your code here

    public $AbsolutePage = 1;
    public $PageCount = 1;
    public $Size = 5;
    public $Prefix = "?p=";
    public $Suffix = "";
    public $FirstText = "首页";
    public $LastText = "末页";
    public $PrevText = "上一页";
    public $NextText = "下一页";
    public $FirstPageLink = false;

    public function GetPageCodes($cssNormal = "normal", $cssSelected = "selected") {
        if ($cssNormal) {
            $cssNormal = ' class="' . $cssNormal . '"';
        }

        if ($cssSelected) {
            $cssSelected = ' class="' . $cssSelected . '"';
        }






        //计算出开始页码和结束页码
        $sNumber = 1;
        $eNumber = 1;
        if ($this->PageCount <= $this->Size) {
            $sNumber = $this->PageCount;
        } else {

            $mNumber = $this->Size % 2 == 0 ? $this->Size / 2 : ($this->Size - 1) / 2 + 1;


            $sNumber = $this->AbsolutePage - $mNumber + 1;


            if ($sNumber < 1)
                $sNumber = 1;


            $eNumber = $sNumber + $this->Size - 1;


            if ($this->PageCount + 1 <= $eNumber) {
                $eNumber = $this->PageCount;
            }
        }


        $htmlString = '';

        for ($p = $sNumber; $p <= $eNumber; $p++) {
            if ($p == $this->AbsolutePage) {

                $htmlString.='<strong' . $cssSelected . '>' . $p . '</strong>';
            } else {

                $href = $this->Prefix . $p . $this->Suffix;

                if ($p == 1 && $this->FirstPageLink) {
                    $href = $this->FirstPageLink;
                }

                $htmlString .= '<a' . $cssNormal . ' href="' . $href . '">' . $p . '</a>';
            }
        }

        return $htmlString;
    }

    public function GetFirst($cssClass = 'first') {
        if ($cssClass) {
            $cssClass = ' class="' . $cssClass . '"';
        }

        $href = $this->Prefix . 1 . $this->Suffix;
        if ($this->PageCount > $this->Size && $this->FirstPageLink) {

            $href = $this->FirstPageLink;
        }

        return '<a' . $cssClass . ' href="' . $href . '">' . $this->FirstText . '</a>';
    }

    public function GetLast($cssClass = 'last') {
        if ($cssClass) {
            $cssClass = ' class="' . $cssClass . '"';
        }

        $href = $this->Prefix . $this->PageCount . $this->Suffix;

        return '<a' . $cssClass . ' href="' . $href . '">' . $this->LastText . '</a>';
    }

    public function GetNext($cssClass = 'next') {
        if ($cssClass) {
            $cssClass = ' class="' . $cssClass . '"';
        }

        if ($this->AbsolutePage < $this->PageCount) {

            $href = $this->Prefix . ($this->AbsolutePage + 1) . $this->Suffix;

            return '<a' . $cssClass . ' href="' . $href . '">' . $this->NextText . '</a>';
        }
    }

    public function GetPrev($cssClass = 'prev') {
        if ($cssClass) {
            $cssClass = ' class="' . $cssClass . '"';
        }

        if ($this->AbsolutePage > 1) {
            $href = $this->Prefix . ($this->AbsolutePage - 1) . $this->Suffix;

            if ($this->AbsolutePage == 2 && $this->FirstPageLink) {
                $href = $this->FirstPageLink;
            }

            return '<a' . $cssClass . ' href="' . $href . '">' . $this->PrevText . '</a>';
        }
    }

    public function GetTotal($cssClass = 'total') {

        if ($cssClass) {
            $cssClass = ' class="' . $cssClass . '"';
        }

        return '<span' . $cssClass . '>' . $this->AbsolutePage . '/' . $this->PageCount . '</span>';
    }

    public function ToString() {

        return $this->GetFirst() . $this->GetPrev() . $this->GetPageCodes() 
                . $this->GetNext() . $this->GetLast() . $this->GetTotal();
    }

}



