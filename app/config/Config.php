<?php

namespace config;

abstract class Config
{
    const JWT_PASSWORD = 'brAS2_3eW?qa';
    const EXP_HOURS = 3;
    const DEFAULT_FORMAT = 'json';

    const WORLD_MAX_GALAXIES = 9;
    const GALAXY_MAX_SYSTEMS = 255;
    const SYSTEM_MAX_PLANETS = 15;

    const PLANET_SIZE_MULTIPLIER = 1;
    const INITIAL_DIAMETER = 12800;

    const INITIAL_METAL = 500;
    const INITIAL_CRYSTAL = 500;
    const INITIAL_DEUTERIUM = 0;
}
