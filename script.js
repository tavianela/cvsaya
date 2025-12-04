function submitCommentSimulation(buttonElement, articleId) {
    const adminCommentSection = buttonElement.closest('.admin-comment-section');
    const textarea = adminCommentSection.querySelector('.comment-textarea');
    const notificationDiv = adminCommentSection.querySelector('.comment-notification');
    const userEmail = 'Pengguna Publik'; // Default user for comments
    const userInitial = userEmail.charAt(0).toUpperCase();
    const commentText = textarea.value.trim();

    if (commentText === '') {
        notificationDiv.style.backgroundColor = '#f8d7da'; // light red
        notificationDiv.style.color = '#721c24'; // dark red
        notificationDiv.innerHTML = 'Komentar tidak boleh kosong!';
        notificationDiv.style.display = 'block';
        setTimeout(() => {
            notificationDiv.style.display = 'none';
        }, 3000);
        return;
    }

    notificationDiv.style.backgroundColor = '#d4edda'; // light green
    notificationDiv.style.color = '#155724'; // dark green
    notificationDiv.innerHTML = `<span class="user-initial-logo">${userInitial}</span> Komentar dari <strong>${userEmail}</strong>: '${commentText}' telah terkirim!`;
    notificationDiv.style.display = 'block';
    textarea.value = ''; // Clear the textarea

    const articleElement = document.getElementById(articleId);
    if (articleElement) {
        const existingCommentsSection = articleElement.querySelector('.existing-comments');
        if (existingCommentsSection) {
            const newCommentHtml = `
                <div class="comment-item new-temp-comment">
                    <span class="user-initial-logo">${userInitial}</span> <strong>${userEmail}</strong>: ${commentText}
                    <div class="comment-actions">
                        <button class="btn-small" onclick="toggleReplyForm(this)">Balas</button>
                    </div>
                    <div class="admin-reply-form" style="display: none;">
                        <textarea placeholder="Tulis balasan Anda..." rows="2"></textarea>
                        <button class="btn-small" onclick="submitReplySimulation(this)">Kirim Balasan</button>
                        <div class="reply-notification" style="display: none;"></div>
                    </div>
                    <div class="temporary-replies-section"></div>
                </div>
            `;
            existingCommentsSection.insertAdjacentHTML('beforeend', newCommentHtml);
        }
    }

    let newCommentsCount = parseInt(localStorage.getItem('newCommentsCount') || '0');
    newCommentsCount++;
    localStorage.setItem('newCommentsCount', newCommentsCount.toString());

    setTimeout(() => {
        notificationDiv.style.display = 'none';
    }, 5000);
}

function deleteCommentSimulation(buttonElement) {
    console.log("Comment deletion is disabled.");
}

function toggleReplyForm(buttonElement) {
    const commentItem = buttonElement.closest('.comment-item');
    const replyForm = commentItem.querySelector('.admin-reply-form');
    if (replyForm) {
        // Only NelaOktavia can reply, so only show the form if the current user is NelaOktavia
        // Since there's no login, we'll assume 'NelaOktavia' is a special role or hardcoded for replies
        const userEmail = 'NelaOktavia'; // Assuming NelaOktavia is the only one who can reply
        if (userEmail === 'NelaOktavia') {
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        } else {
            alert("Hanya NelaOktavia yang dapat membalas komentar ini.");
        }
    }
}

function submitReplySimulation(buttonElement) {
    const replyForm = buttonElement.closest('.admin-reply-form');
    const textarea = replyForm.querySelector('textarea');
    const replyNotificationDiv = replyForm.querySelector('.reply-notification');
    const userEmail = 'NelaOktavia'; // Assuming NelaOktavia is the only one who can reply
    const userInitial = userEmail.charAt(0).toUpperCase();
    const replyText = textarea.value.trim();

    if (replyText === '') {
        replyNotificationDiv.style.backgroundColor = '#f8d7da';
        replyNotificationDiv.style.color = '#721c24';
        replyNotificationDiv.textContent = 'Balasan tidak boleh kosong!';
        replyNotificationDiv.style.display = 'block';
        setTimeout(() => { replyNotificationDiv.style.display = 'none'; }, 3000);
        return;
    }

    if (userEmail !== 'NelaOktavia') {
        alert("Hanya NelaOktavia yang dapat membalas komentar ini.");
        return;
    }

    replyNotificationDiv.style.backgroundColor = '#d4edda';
    replyNotificationDiv.style.color = '#155724';
    replyNotificationDiv.textContent = `Balasan dari ${userEmail} telah terkirim!`;
    replyNotificationDiv.style.display = 'block';
    textarea.value = '';

    const commentItem = buttonElement.closest('.comment-item');
    const temporaryRepliesSection = commentItem.querySelector('.temporary-replies-section');
    if (temporaryRepliesSection) {
        const profilePicHtml = userEmail === 'NelaOktavia' ? `<img src="profil.jpeg" alt="Profile Picture" class="profile-pic-small">` : '';
        const newReplyHtml = `
            <div class="comment-item reply-item new-temp-reply">
                ${profilePicHtml} <span class="user-initial-logo">${userInitial}</span> <strong>${userEmail}</strong>: ${replyText}
            </div>
        `;
        temporaryRepliesSection.insertAdjacentHTML('beforeend', newReplyHtml);
    }

    setTimeout(() => { replyNotificationDiv.style.display = 'none'; }, 5000);
}

function checkUserRole() {
    const adminLink = document.getElementById('admin-link');
    const commentForms = document.querySelectorAll('.comment-form');

    // Always hide admin link as there's no admin login
    if (adminLink) {
        adminLink.style.display = 'none';
    }

    // Always show guest comment section
    if (commentForms) {
        commentForms.forEach(form => {
            const adminSection = form.querySelector('.admin-comment-section');
            const guestSection = form.querySelector('.guest-comment-section');
            if (adminSection) adminSection.style.display = 'block'; // Assuming public users can comment
            if (guestSection) guestSection.style.display = 'none'; // Hide guest message if comment form is shown
        });
    }

    // Hide all comment actions (reply buttons) and admin reply forms by default
    const commentActions = document.querySelectorAll('.comment-actions');
    if (commentActions) {
        commentActions.forEach(actions => actions.style.display = 'none');
    }
    const adminReplyForms = document.querySelectorAll('.admin-reply-form');
    if (adminReplyForms) {
        adminReplyForms.forEach(form => form.style.display = 'none');
    }
}
