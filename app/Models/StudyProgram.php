<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\StudyProgram
 *
 * @property int $id
 * @property int $faculty_id
 * @property string $name
 * @property string $code
 * @property string $level
 * @property string|null $description
 * @property string|null $accreditation
 * @property int $duration_semesters
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Faculty $faculty
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $students
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|StudyProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyProgram query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudyProgram active()
 * @method static \Database\Factories\StudyProgramFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class StudyProgram extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'faculty_id',
        'name',
        'code',
        'level',
        'description',
        'accreditation',
        'duration_semesters',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'duration_semesters' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the faculty that owns the study program.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Get the students for the study program.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Scope a query to only include active study programs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}