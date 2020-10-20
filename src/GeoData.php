<?php

namespace App;

use App\Models\MarkerModel;

/**
 * Class GeoData
 */
class GeoData
{
    /**
     * @param string $file
     * @return array
     * @throws \Exception
     */
    public function getMarkersFromJsonFile($file = __DIR__ . '/../var/json/_pageData.json')
    {
        if (!file_exists($file)) {
            throw new \Exception(sprintf('File %s not found.', $file));
        }

        $pageData = json_decode(file_get_contents($file), true);

        if (empty($pageData)) {
            throw new \Exception('No page data found.');
        }

        $markers = [];
        foreach ($pageData[1][6][0][4][0][6] as $index => $data) {
            $lat = $data[4][0][1][0];
            $lon = $data[4][0][1][1];
            $title = $data[5][0][0];

            if ($title !== $pageData[1][6][0][12][0][13][0][$index][5][0][1][0]) {
                throw new \Exception(sprintf('Marker %s inconsistency found.', $title));
            }

            $location = $pageData[1][6][0][12][0][13][0][$index][5][0][1][0];
            $state = $pageData[1][6][0][12][0][13][0][$index][5][3][0][1][0];
            $address = $pageData[1][6][0][12][0][13][0][$index][5][3][1][1][0];
            $sv = $pageData[1][6][0][12][0][13][0][$index][5][3][2][1][0];

            array_push($markers, new MarkerModel($title, $location, $address, $state, $sv, $lat, $lon));
        }

        return $markers;
    }
}
