<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 *
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The Attributes That Should Be Casted To Native Types.
     *
     * @var array
     */
    protected $casts = [
        'is_locked'  => 'boolean',
        'is_desktop' => 'boolean',
        'is_mobile'  => 'boolean',
    ];

    /**
     * Belongs To A User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'username' => 'System',
            'id'       => '1',
        ]);
    }

    /**
     * Has Many Authentications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authentications()
    {
        return $this->hasMany(Authentication::class);
    }
}