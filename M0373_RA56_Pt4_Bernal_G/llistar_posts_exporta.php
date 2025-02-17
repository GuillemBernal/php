<?php include("cap.php");?>
<?php include("connexio_curl_word.php");?>

<?php

?>

<div class="container">
    <h2>Exportar Json amb PHP</h2>
            <?php foreach ($obj as $post): ?>
                <div class="post">
                    <h2><?php echo htmlspecialchars($post->title->rendered); ?></h2>
                    <p><strong>ID:</strong> <?php echo $post->id; ?></p>
                    <p><strong>Data:</strong> <?php echo $post->date; ?></p>
                    <p><?php echo substr(strip_tags($post->content->rendered), 0, 200) . '...'; ?></p>
                </div>
            <?php endforeach; ?>   
            $html .= "</tbody>
            </table>
</div>";
    
print($html);
?>
<div class="well-sm col-sm-12">
    <div class="d-flex justify-content-center">
        <form action="exporta_excel.php" method="post">
        <input type="hidden" name="taula" value="<?php echo $html; ?>">
            <button type="submit" id="exporta_excel" name='exporta_excel'
                value="Exporta a Excel" class="btn btn-info">Exportar a Excel</button>
        </form>

        <form action="exporta_pdf.php" method="post">
        <input type="hidden" name="taula" value="<?php echo $html; ?>">
            <button type="submit" id="exporta_pdf" name='exporta_pdf'
                value="Exporta a PDF" class="btn btn-info">Exportar a PDF</button>
        </form>

    </div>
</div>