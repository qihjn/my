<?php if (!defined('THINK_PATH')) exit();?><table width="100%" class="contact" >
                                	<tr>
                                        <td height="30" colspan="4" bgcolor="#ffeee0"><strong> &nbsp;联系方式:</strong></td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="8%" height="23" align="center" valign="bottom">联系人：</td>
                                        <td width="42%" valign="bottom"><?php echo ($vo["contacter"]); ?></td>
                                        <td width="6%" align="center" valign="bottom">　</td>
                                        <td width="44%" valign="bottom">　</td>
                                    </tr>
                                    <tr>
                                        <td height="23" align="center" valign="bottom">电话：</td>
                                        <td valign="bottom"><?php echo ($vo["phone"]); ?></td>
                                        <td align="center" valign="bottom">手机:</td>
                                        <td valign="bottom"><?php echo ($vo["mobile"]); ?></td>
                                    </tr>
                                    <tr>
                                        <td height="23" align="center" valign="bottom">传真：</td>
                                        <td valign="bottom"><?php echo ($vo["faq"]); ?></td>
                                        <td align="center" valign="bottom">QQ:</td>
                                        <td valign="bottom"><?php echo ($vo["qq"]); ?></td>
                                    </tr>
                                    <tr>
                                        <td height="23" align="center" valign="bottom">Email</td>
                                        <td valign="bottom"><?php echo ($vo["email"]); ?></td>
                                        <td align="center" valign="bottom">地址：</td>
                                        <td valign="bottom"><?php echo ($vo["addr"]); ?></td>
                                    </tr>
                                    
                                    
                                    
                                </table>