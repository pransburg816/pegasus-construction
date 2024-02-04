   <?php if (get_theme_mod('accessibility_toggle', 'no') === 'yes') : ?>
            <button id="menuButton2" title="menu button" class="gear-icon" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                    <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
                </svg>
            </button>
        <?php endif; ?>


 <?php if (get_theme_mod('accessibility_toggle', 'no') === 'yes') : ?>
                <!-- Your Accessibility Markup Here -->
                <div id="slideOutMenu2">
             <button class="mt-2 px-2 fw-lighter float-end" id="closeButton2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg text-white" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>
                    </button>
                <div class="container">
                    <div class="row p-0 mt-5">
                        <div class="mb-5">
                            <h3 class="fw-lighter text-white">Site Settings</h3>
                        </div>
                        <h5 class="fw-lighter text-white p-3 mb-3">Page Highlights</h5>
                        <div id="highlightLinks" class="col-lg-6 p-3 mb-1 text-center">
                            <div class="text fw-bold text-center text-white">Highlight Links</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-toggle-off text-white" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                            </svg>
                        </div>
                         <div id="highlightText" class="col-lg-6 p-3 mb-1 text-center">
                            <div class="text fw-bold text-center text-white">Highlight Bold Text</div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-toggle-off text-white" viewBox="0 0 16 16">
                                <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="row p-0 justify-content-center">
                        <div class="w-50 p-3 highlight highlight-text mb-1 text-center">
                            <button id="resetButton" tabindex="0" aria-label="Reset font size, line height, highlight links, bold text, letter spacing, and brightness">
                                Reset Highligts
                            </button>
                        </div>
                    </div>
                    <h5 class="fw-lighter text-white p-3 mb-3">Font Adjustment</h5>
                    <div class="row p-0">
                        <div class="col-lg-4 p-3 mb-1">
                            <div class="text fw-bold text-center text-white">Adjust Font</div>
                            <div class="font-adjuster">
                                <button class="font-adjuster__plus-button" tabindex="0" aria-label="Increase font size">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                                  <span class="font-size-indicator text-white">100%</span>
                                 <button class="font-adjuster__minus-button" tabindex="0" aria-label="Decrease font size">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                    </svg>
                                </button>
                             </div>
                        </div>
                        <div class="col-lg-4 p-3 mb-1">
                            <div class="text fw-bold text-center text-white">Line Height</div>
                            <div class="font-adjuster">
                                <button class="line-height-adjuster__plus-button" tabindex="0" aria-label="Increase line height">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                              </button>
                              <span class="line-height-indicator text-white">100%</span>
                              <button class="line-height-adjuster__minus-button" tabindex="0" aria-label="Decrease line height">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                </svg>
                              </button>
                            </div>
                        </div>
                        <div class="col-lg-4 p-3 mb-1">
                            <div class="text fw-bold text-center text-white">Letter Spacing</div>
                            <div class="font-adjuster">
                              <button class="letter-spacing-adjuster__plus-button" tabindex="0" aria-label="Increase letter spacing">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                              </button>
                              <span class="letter-spacing-indicator text-white">100%</span>
                              <button class="letter-spacing-adjuster__minus-button" tabindex="0" aria-label="Decrease letter spacing">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                                </svg>
                              </button>
                            </div>
                        </div>
                   </div>

                    <div class="row p-0 justify-content-center">
                        <div class="w-50 highlight highlight-text p-3 mb-1 text-center">
                            <button class="reset-button" tabindex="0" aria-label="Reset font size and line height">
                                Reset Font Settings
                            </button>
                        </div>
                    </div>

                    <div class="row p-0">
                        <div class="col-lg-12 p-3 mb-1 text-center">
                             <div class="text fw-bold text-white">Adjust Page Brightness</div>
                            <div id="brightnessText" class="text p-3 text-white">100%</div>
                            <input type="range" min="0" max="2" step="0.1" value="1" id="brightnessSlider" class="slider" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>