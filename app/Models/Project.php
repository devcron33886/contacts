<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, InteractsWithMedia, HasFactory;

    public $table = 'projects';

    protected $appends = [
        'project_files',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_id',
        'title',
        'type',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public const STATUS_SELECT = [
        '0' => 'Pending',
        '1' => 'Contract Signed',
        '2' => 'Project Started',
        '3' => 'Delivered',
        '4' => 'Completed',
        '5' => 'Handover',
    ];

    public const TYPE_SELECT = [
        '0' => 'Website Development',
        '1' => 'Web Application Development',
        '2' => 'Mobile Application Development',
        '3' => 'Social Media Management(SMM)',
        '4' => 'Website Maintenance',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getProjectFilesAttribute()
    {
        return $this->getMedia('project_files');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
