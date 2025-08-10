<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Lecturer
 *
 * @property int $id
 * @property string $nip
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $birth_date
 * @property string $gender
 * @property int $faculty_id
 * @property string|null $position
 * @property string|null $education_level
 * @property string|null $expertise
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Faculty $faculty
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Lecturer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lecturer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lecturer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lecturer active()

 * 
 * @mixin \Eloquent
 */
class Lecturer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nip',
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'gender',
        'faculty_id',
        'position',
        'education_level',
        'expertise',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the faculty that owns the lecturer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Scope a query to only include active lecturers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}