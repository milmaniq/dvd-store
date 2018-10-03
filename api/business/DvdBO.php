<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ilman Iqbal
 * Date: 8/5/2018
 * Time: 11:28 PM
 */

interface DvdBO
{
    public function getDvdByTrending();

    public function getDvdByLatest();

    public function getDvdCategory();

    public function getDvdByCategory($category);

    public function getDvd($dvdId);
}