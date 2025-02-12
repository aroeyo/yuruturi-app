   document.addEventListener('DOMContentLoaded', () => {
        const favoriteIcons = document.querySelectorAll('.favorite-icon');

        favoriteIcons.forEach(icon => {
            icon.addEventListener('click', async () => {
                const albumImageId = icon.dataset.albumimageId;
                const isFavorited = icon.dataset.favorited === 'true';

                try {
                    const response = await fetch(window.toggleFavoriteUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ albumimage_id: albumImageId })
                    });

                    if (response.ok) {
                        const data = await response.json();
                        // アイコンの切り替え
                        icon.src = data.isFavorited 
                            ? window.fovoriteHeart
                            : window.normalHeart;
                        icon.dataset.favorited = data.isFavorited;
                    } else {
                        console.error('Failed to toggle favorite');
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });
    });