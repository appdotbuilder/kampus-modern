<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Faculty
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string|null $dean
 * @property string|null $phone
 * @property string|null $email
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StudyProgram[] $studyPrograms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lecturer[] $lecturers
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty active()
 * @method static \Database\Factories\FacultyFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Faculty extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'dean',
        'phone',
        'email',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the study programs for the faculty.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyPrograms(): HasMany
    {
        return $this->hasMany(StudyProgram::class);
    }

    /**
     * Get the lecturers for the faculty.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lecturers(): HasMany
    {
        return $this->hasMany(Lecturer::class);
    }

    /**
     * Scope a query to only include active faculties.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}